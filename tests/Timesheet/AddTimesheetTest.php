<?php
namespace Lsv\TimeharvestTest\Timesheet;

use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\Psr7\Response;
use Lsv\Timeharvest\Project\Document\ProjectDetails;
use Lsv\Timeharvest\Task\Document\TaskDetails;
use Lsv\Timeharvest\Timesheet\AddTimesheet;
use Lsv\Timeharvest\Timesheet\Document\Timesheet;
use Lsv\TimeharvestTest\AbstractTest;

class AddTimesheetTest extends AbstractTest
{

    public function test_post_timesheet_from_class()
    {
        $mocks = new MockHandler([
            new Response(200, ['Content-Type' => 'application/json'], file_get_contents(__DIR__ . '/json/reply.json')),
        ]);

        $action = new AddTimesheet($this->getAuth(), [
            'httpclient' => $this->getHttpClient($mocks),
            'hours' => 2.5,
            'project' => (new ProjectDetails())->setId(123123),
            'task' => (new TaskDetails())->setId(456456),
        ]);

        $response = $action->getResponse();
        $request = $action->getRequest();

        $this->assertInstanceOf(Timesheet::class, $response);
        $this->assertEquals('/daily/add', $request->getUri()->getPath());

        $body = $request->getBody();

        $this->assertJson((string) $body);

        $json = json_decode($body, true);

        $this->assertEquals(123123, $json['project_id']);
        $this->assertEquals(456456, $json['task_id']);
        $this->assertArrayNotHasKey('notes', $json);
    }

    public function test_post_timesheet_from_id()
    {
        $mocks = new MockHandler([
            new Response(200, ['Content-Type' => 'application/json'], file_get_contents(__DIR__ . '/json/reply.json')),
        ]);

        $action = new AddTimesheet($this->getAuth(), [
            'httpclient' => $this->getHttpClient($mocks),
            'hours' => 2.5,
            'project' => 123123,
            'task' => 456456,
        ]);

        $response = $action->getResponse();
        $request = $action->getRequest();

        $this->assertInstanceOf(Timesheet::class, $response);
        $this->assertEquals('/daily/add', $request->getUri()->getPath());

        $body = $request->getBody();

        $this->assertJson((string) $body);

        $json = json_decode($body, true);

        $this->assertEquals(123123, $json['project_id']);
        $this->assertEquals(456456, $json['task_id']);
        $this->assertArrayNotHasKey('notes', $json);
    }

    public function dataProvider()
    {
        return [
            ['getProjectId', 5198193],
            ['getProject', 14775],
            ['getUserId', 508343],
            ['getSpentAt', date_create('2016-01-24')],
            ['getTaskId', 2892243],
            ['getTask', "Backend Programming"],
            ['getClient', "Apple"],
            ['getId', 420932553],
            ['getNotes', "Test API support"],
            ['getCreatedAt', date_create("2016-01-27T21:49:19Z")],
            ['getUpdatedAt', date_create("2016-01-27T21:49:19Z")],
            ['getHoursWithoutTimer', 3],
            ['getHours', 3],
        ];
    }

    /**
     * @dataProvider dataProvider
     * @param string $getter
     * @param mixed $value
     */
    public function test_timesheet_details($getter, $value)
    {
        $mocks = new MockHandler([
            new Response(200, ['Content-Type' => 'application/json'], file_get_contents(__DIR__ . '/json/reply.json')),
        ]);

        $action = new AddTimesheet($this->getAuth(), [
            'httpclient' => $this->getHttpClient($mocks),
            'hours' => 2.5,
            'project' => 123123,
            'task' => 456456,
        ]);

        $response = $action->getResponse();
        $this->assertEquals($value, $response->{$getter}());
    }

}
