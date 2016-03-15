<?php
namespace Lsv\TimeharvestTest;

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use Lsv\Timeharvest\Auth;

abstract class AbstractTimeHarvestTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @param MockHandler $mocks
     * @return Client
     */
    protected function getHttpClient(MockHandler $mocks)
    {
        $handler = HandlerStack::create($mocks);
        return new Client(['handler' => $handler]);
    }

    protected function getAuth()
    {
        return new Auth('test', 'test', 'test');
    }

    protected function getRequireAdminMock()
    {
        return new Response(404, ['X-404-Reason' => 'admin_required']);
    }

}
