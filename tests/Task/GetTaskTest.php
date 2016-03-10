<?php
namespace Lsv\TimeharvestTest\Task;

use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\Psr7\Response;
use Lsv\Timeharvest\Task\Document\TaskDetails;
use Lsv\Timeharvest\Task\GetTask;
use Lsv\TimeharvestTest\AbstractTest;

class GetTaskTest extends AbstractTest
{

    protected function createRequest($taskId)
    {
        $mocks = new MockHandler([
            new Response(200, ['Content-Type' => 'application/json'], file_get_contents(__DIR__ . '/json/task.json')),
        ]);

        return new GetTask($this->getAuth(), [
            'httpclient' => $this->getHttpClient($mocks),
            'task' => $taskId
        ]);
    }

    public function test_get_tasks_from_id()
    {
        $action = $this->createRequest(123);
        $response = $action->getResponse();
        $this->assertInstanceOf(TaskDetails::class, $response);

        $request = $action->getRequest();
        $this->assertEquals('/tasks/123', $request->getUri()->getPath());
    }

    public function test_get_tasks_from_class()
    {
        $action = $this->createRequest((new TaskDetails())->setId(121212));
        $response = $action->getResponse();
        $this->assertInstanceOf(TaskDetails::class, $response);

        $request = $action->getRequest();
        $this->assertEquals('/tasks/121212', $request->getUri()->getPath());
    }

    public function dataProvider()
    {
        return [
            ['getId', 2086199],
            ['getName', "Admin"],
            ['isBillableByDefault', false],
            ['getCreatedAt', date_create("2013-04-30T20:28:12Z")],
            ['getUpdatedAt', date_create("2013-08-14T22:25:42Z")],
            ['isIsDefault', true],
            ['getDefaultHourlyRate', 0],
            ['isDeactivated', true],
        ];
    }

    /**
     * @dataProvider dataProvider
     * @param string $getter
     * @param mixed $value
     */
    public function test_project_details($getter, $value)
    {
        $action = $this->createRequest(123);
        $response = $action->getResponse();
        $this->assertEquals($value, $response->{$getter}());
    }

}
