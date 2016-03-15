<?php
namespace Lsv\TimeharvestTest\Expense;

use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\Psr7\Response;
use Lsv\Timeharvest\Expense\GetExpensesByUser;
use Lsv\TimeharvestTest\AbstractTimeHarvestTest;

class GetExpensesByUserTimeHarvestTest extends AbstractTimeHarvestTest
{

    public function test_get_expenses()
    {
        $mocks = new MockHandler([
            new Response(200, ['Content-Type' => 'application/json'], file_get_contents(__DIR__ . '/json/expenses.json')),
        ]);

        $client = $this->getHttpClient($mocks);

        $from = (new \DateTime())->modify('-2 days');
        $to = new \DateTime();

        $getter = new GetExpensesByUser($this->getAuth(), [
            'httpclient' => $client,
            'from' => $from,
            'to' => $to,
            'user' => 112233
        ]);

        $response = $getter->getResponse();
        $this->assertEquals(2, count($response));

        $request = $getter->getRequest();
        $assert = sprintf('/people/112233/expenses?from=%s&to=%s&is_closed=no', $from->format('Ymd'), $to->format('Ymd'));
        $this->assertEquals($assert, $request->getUri()->getPath() . '?' . $request->getUri()->getQuery());
    }

}
