<?php
namespace Lsv\TimeharvestTest\Task;

use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\Psr7\Response;
use Lsv\Timeharvest\Task\GetTasks;
use Lsv\TimeharvestTest\AbstractTest;

class GetTasksTest extends AbstractTest
{

    public function test_get_tasks()
    {
        $mocks = new MockHandler([
            new Response(200, ['Content-Type' => 'application/json'], file_get_contents(__DIR__ . '/json/tasks.json')),
        ]);

        $client = $this->getHttpClient($mocks);

        $getter = new GetTasks($this->getAuth(), [
            'httpclient' => $client
        ]);

        $response = $getter->getResponse();
        $this->assertEquals(2, count($response));

        $request = $getter->getRequest();
        $this->assertEquals('/tasks', $request->getUri()->getPath());
    }

    public function test_get_tasks_with_updated()
    {
        $mocks = new MockHandler([
            new Response(200, ['Content-Type' => 'application/json'], file_get_contents(__DIR__ . '/json/tasks.json')),
        ]);

        $client = $this->getHttpClient($mocks);

        $date = new \DateTime();
        $getter = new GetTasks($this->getAuth(), [
            'httpclient' => $client,
            'updated' => $date
        ]);

        $response = $getter->getResponse();
        $this->assertEquals(2, count($response));

        $request = $getter->getRequest();
        $expected = sprintf('updated_since=%s', urlencode($date->format('Y-m-d H:i')));
        $this->assertEquals($expected, $request->getUri()->getQuery());
    }

    /**
     * @expectedException \Exception
     */
    public function test_get_tasks_404()
    {
        $mocks = new MockHandler([
            new Response(404),
        ]);

        $client = $this->getHttpClient($mocks);
        (new GetTasks($this->getAuth(), [
            'httpclient' => $client
        ]))->getResponse();
    }

}
