<?php
namespace Lsv\TimeharvestTest\Client;

use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\Psr7\Response;
use Lsv\Timeharvest\Client\GetClients;
use Lsv\TimeharvestTest\AbstractTimeHarvestTest;

class GetClientsTimeHarvestTest extends AbstractTimeHarvestTest
{

    public function test_get_clients()
    {
        $mocks = new MockHandler([
            new Response(200, ['Content-Type' => 'application/json'], file_get_contents(__DIR__ . '/json/clients.json')),
        ]);

        $client = $this->getHttpClient($mocks);

        $getter = new GetClients($this->getAuth(), [
            'httpclient' => $client
        ]);

        $response = $getter->getResponse();
        $this->assertEquals(2, count($response));

        $request = $getter->getRequest();
        $this->assertEquals('/clients', $request->getUri()->getPath());
    }

    /**
     * @expectedException \Lsv\Timeharvest\Exceptions\Exception
     */
    public function test_get_clients_404()
    {
        $mocks = new MockHandler([
            new Response(404),
        ]);

        $client = $this->getHttpClient($mocks);
        (new GetClients($this->getAuth(), [
            'httpclient' => $client
        ]))->getResponse();
    }

}
