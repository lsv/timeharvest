<?php
namespace Lsv\TimeharvestTest\Project;

use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\Psr7\Response;
use Lsv\Timeharvest\Client\Document\ClientDetails;
use Lsv\Timeharvest\Project\GetProjects;
use Lsv\TimeharvestTest\AbstractTest;

class GetProjectsTest extends AbstractTest
{

    public function test_get_projects()
    {
        $mocks = new MockHandler([
            new Response(200, ['Content-Type' => 'application/json'], file_get_contents(__DIR__ . '/json/projects.json')),
        ]);

        $client = $this->getHttpClient($mocks);

        $getter = new GetProjects($this->getAuth(), [
            'httpclient' => $client
        ]);

        $response = $getter->getResponse();
        $this->assertEquals(2, count($response));

        $request = $getter->getRequest();
        $this->assertEquals('/projects', $request->getUri()->getPath());
    }

    public function test_get_projects_with_updated()
    {
        $mocks = new MockHandler([
            new Response(200, ['Content-Type' => 'application/json'], file_get_contents(__DIR__ . '/json/projects.json')),
        ]);

        $client = $this->getHttpClient($mocks);

        $date = new \DateTime();
        $getter = new GetProjects($this->getAuth(), [
            'httpclient' => $client,
            'updated' => $date
        ]);

        $response = $getter->getResponse();
        $this->assertEquals(2, count($response));

        $request = $getter->getRequest();
        $expected = sprintf('updated_since=%s', urlencode($date->format('Y-m-d H:i')));
        $this->assertEquals($expected, $request->getUri()->getQuery());
    }

    public function test_get_projects_with_client()
    {
        $mocks = new MockHandler([
            new Response(200, ['Content-Type' => 'application/json'], file_get_contents(__DIR__ . '/json/projects.json')),
        ]);

        $client = $this->getHttpClient($mocks);

        $projectclient = new ClientDetails();
        $projectclient->setId(123123);
        $getter = new GetProjects($this->getAuth(), [
            'httpclient' => $client,
            'client' => $projectclient
        ]);

        $response = $getter->getResponse();
        $this->assertEquals(2, count($response));

        $request = $getter->getRequest();
        $expected = sprintf('client_id=%d', $projectclient->getId());
        $this->assertEquals($expected, $request->getUri()->getQuery());
    }

    public function test_get_projects_with_client_and_updated()
    {
        $mocks = new MockHandler([
            new Response(200, ['Content-Type' => 'application/json'], file_get_contents(__DIR__ . '/json/projects.json')),
        ]);

        $client = $this->getHttpClient($mocks);

        $date = new \DateTime();
        $projectclient = new ClientDetails();
        $projectclient->setId(123123);
        $getter = new GetProjects($this->getAuth(), [
            'httpclient' => $client,
            'client' => $projectclient,
            'updated' => $date
        ]);

        $response = $getter->getResponse();
        $this->assertEquals(2, count($response));

        $request = $getter->getRequest();
        $expected = sprintf(
            'updated_since=%s&client_id=%d',
            urlencode($date->format('Y-m-d H:i')),
            $projectclient->getId()
        );
        $this->assertEquals($expected, $request->getUri()->getQuery());
    }

    /**
     * @expectedException \Exception
     */
    public function test_get_clients_404()
    {
        $mocks = new MockHandler([
            new Response(404),
        ]);

        $client = $this->getHttpClient($mocks);
        (new GetProjects($this->getAuth(), [
            'httpclient' => $client
        ]))->getResponse();
    }

}
