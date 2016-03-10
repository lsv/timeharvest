<?php
namespace Lsv\TimeharvestTest\Client;

use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\Psr7\Response;
use Lsv\Timeharvest\Client\Document\ClientDetails;
use Lsv\Timeharvest\Client\GetClient;
use Lsv\Timeharvest\Client\GetClients;
use Lsv\TimeharvestTest\AbstractTest;

class GetClientTest extends AbstractTest
{

    protected function createRequest($clientId)
    {
        $mocks = new MockHandler([
            new Response(200, ['Content-Type' => 'application/json'], file_get_contents(__DIR__ . '/json/client.json')),
        ]);

        return new GetClient($this->getAuth(), [
            'httpclient' => $this->getHttpClient($mocks),
            'client' => $clientId
        ]);
    }

    public function test_get_client_from_id()
    {
        $action = $this->createRequest(123);
        $response = $action->getResponse();
        $this->assertInstanceOf(ClientDetails::class, $response);

        $request = $action->getRequest();
        $this->assertEquals('/clients/123', $request->getUri()->getPath());
    }

    public function test_get_client_from_class()
    {
        $action = $this->createRequest((new ClientDetails())->setId(121212));
        $response = $action->getResponse();
        $this->assertInstanceOf(ClientDetails::class, $response);

        $request = $action->getRequest();
        $this->assertEquals('/clients/121212', $request->getUri()->getPath());
    }

    public function dataProvider()
    {
        return [
            ['getName', 'Your Account 2'],
            ['isActive', true],
            ['getCurrency', 'United States Dollar - USD'],
            ['getHighriseId', null],
            ['getCacheVersion', 821859238],
            ['getUpdatedAt', date_create('2015-04-15T16:25:50Z')],
            ['getCreatedAt', date_create('2015-04-13T16:25:50Z')],
            ['getCurrencySymbol', '$'],
            ['getDetails', "123 Main St\r\nAnytown, NY 12344"],
            ['getDefaultInvoiceTimeframe', null],
            ['getLastInvoiceKind', null]
        ];
    }

    /**
     * @dataProvider dataProvider
     * @param string $getter
     * @param mixed $value
     */
    public function test_client_details($getter, $value)
    {
        $action = $this->createRequest(123);
        $response = $action->getResponse();
        $this->assertEquals($value, $response->{$getter}());
    }

}
