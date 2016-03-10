<?php
namespace Lsv\TimeharvestTest;

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use Lsv\Timeharvest\Auth;

abstract class AbstractTest extends \PHPUnit_Framework_TestCase
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

}
