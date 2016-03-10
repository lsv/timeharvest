<?php
namespace Lsv\TimeharvestTest;

use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\Psr7\Response;
use Lsv\Timeharvest\Exceptions\BodyNotJsonException;
use Lsv\Timeharvest\Project\GetProjects;
use Psr\Http\Message\ResponseInterface;

class TimeHarvestTest extends AbstractTest
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
        }
    }

    /**
     * @expectedException \GuzzleHttp\Exception\ClientException
     */
    public function test_get_client_exception()
    {
        $mocks = new MockHandler([
            new Response(401),
        ]);

        $client = $this->getHttpClient($mocks);

        (new GetProjects($this->getAuth(), [
            'httpclient' => $client
        ]))->getResponse();
    }

}
