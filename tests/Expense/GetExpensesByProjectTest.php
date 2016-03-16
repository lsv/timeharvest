<?php
namespace Lsv\TimeharvestTest\Expense;

use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\Psr7\Response;
use Lsv\Timeharvest\Expense\GetExpensesByProject;
use Lsv\Timeharvest\Project\Document\Project;
use Lsv\TimeharvestTest\AbstractTimeHarvestTest;

class GetExpensesByProjectTimeHarvestTest extends AbstractTimeHarvestTest
{

    public function test_get_expenses()
    {
        $mocks = new MockHandler([
            new Response(200, ['Content-Type' => 'application/json'], file_get_contents(__DIR__ . '/json/expenses.json')),
        ]);

        $client = $this->getHttpClient($mocks);

        $from = (new \DateTime())->modify('-2 days');
        $to = new \DateTime();

        $getter = new GetExpensesByProject($this->getAuth(), [
            'httpclient' => $client,
            'from' => $from,
            'to' => $to,
            'project' => 4321
        ]);

        $response = $getter->getResponse();
        $this->assertEquals(2, count($response));

        $request = $getter->getRequest();
        $assert = sprintf('/projects/4321/expenses?from=%s&to=%s&is_closed=no', $from->format('Ymd'), $to->format('Ymd'));
        $this->assertEquals($assert, $request->getUri()->getPath() . '?' . $request->getUri()->getQuery());
    }

    public function test_get_expenses_by_project()
    {
        $mocks = new MockHandler([
            new Response(200, ['Content-Type' => 'application/json'], file_get_contents(__DIR__ . '/json/expenses.json')),
        ]);

        $client = $this->getHttpClient($mocks);

        $from = (new \DateTime())->modify('-2 days');
        $to = new \DateTime();

        $getter = new GetExpensesByProject($this->getAuth(), [
            'httpclient' => $client,
            'from' => $from,
            'to' => $to,
            'project' => (new Project())->setId(1234)
        ]);

        $response = $getter->getResponse();
        $this->assertEquals(2, count($response));

        $request = $getter->getRequest();
        $assert = sprintf('/projects/1234/expenses?from=%s&to=%s&is_closed=no', $from->format('Ymd'), $to->format('Ymd'));
        $this->assertEquals($assert, $request->getUri()->getPath() . '?' . $request->getUri()->getQuery());
    }

    public function dataProvider()
    {
        return [
            ['getId', 4],
            ['getTotalCost', 100.65],
            ['getUnits', 1],
            ['getCreatedAt', date_create('2015-10-02T23:34:55Z')],
            ['getUpdatedAt', date_create('2015-10-02T23:34:55Z')],
            ['getProjectId', 24],
            ['getExpenseCategoryId', 2],
            ['getUserId', 1],
            ['getSpentAt', date_create('2015-10-02')],
            ['isIsClosed', false],
            ['getNotes', "Some notes."],
            ['getInvoiceId', 0],
            ['isBillable', true],
            ['getCompanyId', 1],
            ['isHasReceipt', false],
            ['getReceiptUrl', ""],
            ['isIsLocked', false],
            ['getLockedReason', null],
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
            new Response(200, ['Content-Type' => 'application/json'], file_get_contents(__DIR__ . '/json/expense.json')),
        ]);

        $client = $this->getHttpClient($mocks);

        $from = (new \DateTime())->modify('-2 days');
        $to = new \DateTime();

        $response = (new GetExpensesByProject($this->getAuth(), [
            'httpclient' => $client,
            'project' => (new Project())->setId(4321),
            'from' => $from,
            'to' => $to
        ]))->getResponse()[0];

        $this->assertEquals($response->{$getter}(), $value);

    }

}
