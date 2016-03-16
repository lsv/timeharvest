<?php
namespace Lsv\TimeharvestTest\Project;

use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\Psr7\Response;
use Lsv\Timeharvest\Project\Document\Project;
use Lsv\Timeharvest\Project\GetProject;
use Lsv\TimeharvestTest\AbstractTimeHarvestTest;

class GetProjectTimeHarvestTest extends AbstractTimeHarvestTest
{

    protected function createRequest($projectId)
    {
        $mocks = new MockHandler([
            new Response(200, ['Content-Type' => 'application/json'], file_get_contents(__DIR__ . '/json/project.json')),
        ]);

        return new GetProject($this->getAuth(), [
            'httpclient' => $this->getHttpClient($mocks),
            'project' => $projectId
        ]);
    }

    public function test_get_project_from_id()
    {
        $action = $this->createRequest(123);
        $response = $action->getResponse();
        $this->assertInstanceOf(Project::class, $response);

        $request = $action->getRequest();
        $this->assertEquals('/projects/123', $request->getUri()->getPath());
    }

    public function test_get_project_from_class()
    {
        $action = $this->createRequest((new Project())->setId(121212));
        $response = $action->getResponse();
        $this->assertInstanceOf(Project::class, $response);

        $request = $action->getRequest();
        $this->assertEquals('/projects/121212', $request->getUri()->getPath());
    }

    public function dataProvider()
    {
        return [
            ['getId', 3554414],
            ['getClientId', 3398386],
            ['getName', "Internal"],
            ['getCode', "Testing"],
            ['isActive', true],
            ['isBillable', true],
            ['getBillBy', "People"],
            ['getHourlyRate', 100],
            ['getBudget', 100],
            ['getBudgetBy', "project"],
            ['isNotifyWhenOverBudget', true],
            ['getOverBudgetNotificationPercentage', 80],
            ['getOverBudgetNotifiedAt', null],
            ['isShowBudgetToAll', true],
            ['getCreatedAt', date_create('2013-04-30T20:28:12Z')],
            ['getUpdatedAt', date_create('2015-04-15T15:44:17Z')],
            ['getStartsOn', date_create('2013-04-30')],
            ['getEndsOn', date_create('2015-06-01')],
            ['getEstimate', 100],
            ['getEstimateBy', "project"],
            ['getHintEarliestRecordAt', date_create('2013-04-30')],
            ['getHintLatestRecordAt', date_create('2014-12-09')],
            ['getNotes', 'Some project notes go here!'],
            ['getCostBudget', null],
            ['isCostBudgetIncludeExpenses', false],
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
