<?php
namespace Lsv\TimeharvestTest;

use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use Lsv\Timeharvest\Exceptions\BodyNotJsonException;
use Lsv\Timeharvest\Exceptions\RequireAdminException;
use Lsv\Timeharvest\Project\GetProjects;
use Psr\Http\Message\ResponseInterface;

class TimeHarvestTimeHarvestTest extends AbstractTimeHarvestTest
{

    /**
     * @expectedException \Lsv\Timeharvest\Exceptions\BodyNotJsonException
     */
    public function test_get_bodyjsonException()
    {
        $mocks = new MockHandler([
            new Response(200, ['Content-Type' => 'application/json'], 'Im not a valid JSON'),
        ]);

        $client = $this->getHttpClient($mocks);

        (new GetProjects($this->getAuth(), [
            'httpclient' => $client
        ]))->getResponse();
    }

    public function test_get_bodyjsonException_response()
    {
        $mocks = new MockHandler([
            new Response(200, ['Content-Type' => 'application/json'], 'Im not a valid JSON'),
        ]);

        $client = $this->getHttpClient($mocks);
        try {
            (new GetProjects($this->getAuth(), [
                'httpclient' => $client
            ]))->getResponse();
        } catch (BodyNotJsonException $e) {
            $this->assertInstanceOf(ResponseInterface::class, $e->getResponse());
            $this->assertInstanceOf(Request::class, $e->getRequest());
        }
    }

    /**
     * @expectedException \Lsv\Timeharvest\Exceptions\AuthenticationFailedException
     */
    public function test_get_client_exception()
    {
        $mocks = new MockHandler([
            new Response(401, ['X-401-Reason' => ['Whoops']]),
        ]);

        $client = $this->getHttpClient($mocks);

        (new GetProjects($this->getAuth(), [
            'httpclient' => $client
        ]))->getResponse();
    }

    public function test_get_requiresadmin()
    {
        $mocks = new MockHandler([
            new Response(404, ['X-404-Reason' => 'admin_required']),
        ]);

        $client = $this->getHttpClient($mocks);

        try {
            (new GetProjects($this->getAuth(), [
                'httpclient' => $client
            ]))->getResponse();
        } catch (RequireAdminException $e) {
            $this->assertEquals('admin_required', $e->getReason());
        }
    }

    /**
     * @expectedException \Lsv\Timeharvest\Exceptions\Exception
     */
    public function test_get_another_404_reason()
    {
        $mocks = new MockHandler([
            new Response(404, ['X-404-Reason' => 'Whooops']),
        ]);

        $client = $this->getHttpClient($mocks);

        (new GetProjects($this->getAuth(), [
            'httpclient' => $client
        ]))->getResponse();
    }

    /**
     * @expectedException \Lsv\Timeharvest\Exceptions\Exception
     */
    public function test_get_another_405_reason()
    {
        $mocks = new MockHandler([
            new Response(405),
        ]);

        $client = $this->getHttpClient($mocks);

        (new GetProjects($this->getAuth(), [
            'httpclient' => $client
        ]))->getResponse();
    }

}
