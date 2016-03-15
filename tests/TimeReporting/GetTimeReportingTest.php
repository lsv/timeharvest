<?php
namespace Lsv\TimeharvestTest\TimeReporting;

use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\Psr7\Response;
use Lsv\Timeharvest\Project\Document\ProjectDetails;
use Lsv\Timeharvest\TimeReporting\GetTimeReporting;
use Lsv\TimeharvestTest\AbstractTimeHarvestTest;
use Nette\Utils\DateTime;

class GetTimeReportingTimeHarvestTest extends AbstractTimeHarvestTest
{

    public function test_get_timereportings()
    {
        $mocks = new MockHandler([
            new Response(200, ['Content-Type' => 'application/json'], file_get_contents(__DIR__ . '/json/entries.json')),
        ]);

        $client = $this->getHttpClient($mocks);

        $from = (new \DateTime())->modify('-2 days');
        $to = new DateTime();

        $getter = new GetTimeReporting($this->getAuth(), [
            'httpclient' => $client,
            'project' => 1234,
            'from' => $from,
            'to' => $to
        ]);

        $response = $getter->getResponse();

        $this->assertEquals(2, count($response));

        $request = $getter->getRequest();

        $assert = sprintf('/projects/1234/entries?from=%s&to=%s', $from->format('Ymd'), $to->format('Ymd'));
        $this->assertEquals($assert, $request->getUri()->getPath() . '?' . $request->getUri()->getQuery());
    }

    public function test_get_timereportings_with_project()
    {
        $mocks = new MockHandler([
            new Response(200, ['Content-Type' => 'application/json'], file_get_contents(__DIR__ . '/json/entries.json')),
        ]);

        $client = $this->getHttpClient($mocks);

        $from = (new \DateTime())->modify('-2 days');
        $to = new \DateTime();

        $getter = new GetTimeReporting($this->getAuth(), [
            'httpclient' => $client,
            'project' => (new ProjectDetails())->setId(4321),
            'from' => $from,
            'to' => $to
        ]);

        $response = $getter->getResponse();

        $this->assertEquals(2, count($response));

        $request = $getter->getRequest();

        $assert = sprintf('/projects/4321/entries?from=%s&to=%s', $from->format('Ymd'), $to->format('Ymd'));
        $this->assertEquals($assert, $request->getUri()->getPath() . '?' . $request->getUri()->getQuery());
    }

    public function dataProvider()
    {
        return [
            ['getId', 367231665],
            ['getNotes', "Some notes."],
            ['getSpentAt', date_create('2015-07-01')],
            ['getHours', 0.16],
            ['getUserId', 508343],
            ['getProjectId', 3554414],
            ['getTaskId', 2086200],
            ['getCreatedAt', date_create('2015-08-25T14:31:52Z')],
            ['getUpdatedAt', date_create('2015-08-25T14:47:02Z')],
            ['isAdjustmentRecord', false],
            ['getTimerStartedAt', date_create('2015-08-25T14:47:02Z')],
            ['isIsClosed', false],
            ['isIsBilled', false],
            ['getHoursWithTimer', 0.16],
        ];
    }

    /**
     * @dataProvider dataProvider
     * @param string $getter
     * @param mixed $value
     */
    public function test_get_timereportings_details($getter, $value)
    {
        $mocks = new MockHandler([
            new Response(200, ['Content-Type' => 'application/json'], file_get_contents(__DIR__ . '/json/entry.json')),
        ]);

        $client = $this->getHttpClient($mocks);

        $from = (new \DateTime())->modify('-2 days');
        $to = new DateTime();

        $response = (new GetTimeReporting($this->getAuth(), [
            'httpclient' => $client,
            'project' => (new ProjectDetails())->setId(4321),
            'from' => $from,
            'to' => $to
        ]))->getResponse()[0];

        $this->assertEquals($response->{$getter}(), $value);

    }

}
