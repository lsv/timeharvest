<?php
namespace Lsv\TimeharvestTest\User;

use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\Psr7\Response;
use Lsv\Timeharvest\User\GetUsers;
use Lsv\TimeharvestTest\AbstractTimeHarvestTest;

class GetUsersTest extends AbstractTimeHarvestTest
{

    public function test_get_getusers()
    {
        $mocks = new MockHandler([
            new Response(200, ['Content-Type' => 'application/json'], file_get_contents(__DIR__ . '/json/users.json')),
        ]);

        $client = $this->getHttpClient($mocks);

        $getter = new GetUsers($this->getAuth(), [
            'httpclient' => $client,
        ]);

        $response = $getter->getResponse();

        $this->assertEquals(2, count($response));

        $request = $getter->getRequest();
        $this->assertEquals('/people', $request->getUri()->getPath());
    }

    public function test_get_getusers_with_updated()
    {
        $mocks = new MockHandler([
            new Response(200, ['Content-Type' => 'application/json'], file_get_contents(__DIR__ . '/json/users.json')),
        ]);

        $client = $this->getHttpClient($mocks);

        $updated = (new \DateTime())->modify('-2 days');

        $getter = new GetUsers($this->getAuth(), [
            'httpclient' => $client,
            'updated' => $updated,
        ]);

        $response = $getter->getResponse();

        $this->assertEquals(2, count($response));

        $request = $getter->getRequest();

        $assert = sprintf('/people?updated_since=%s', urlencode($updated->format('Y-m-d H:i')));
        $this->assertEquals($assert, $request->getUri()->getPath() . '?' . $request->getUri()->getQuery());
    }

    public function dataProvider()
    {
        return [
            ['getId', 508343],
            ['getEmail', "user@example.com"],
            ['getCreatedAt', date_create('2013-04-30T20:28:12Z')],
            ['isIsAdmin', true],
            ['getFirstName', "Harvest"],
            ['getLastName', "User"],
            ['getTimezone', "Eastern Time (US & Canada)"],
            ['isIsContractor', false],
            ['getTelephone', ""],
            ['isIsActive', true],
            ['isHasAccessToAllFutureProjects', true],
            ['getDefaultHourlyRate', 0],
            ['getDepartment', ""],
            ['isWantsNewsletter', true],
            ['getUpdatedAt', date_create("2015-04-29T14:54:19Z")],
            ['getCostRate', null],
            ['getIdentityAccountId', 302900],
            ['getIdentityUserId', 20725],
        ];
    }

    /**
     * @dataProvider dataProvider
     * @param string $getter
     * @param mixed $value
     */
    public function test_get_getusers_details($getter, $value)
    {
        $mocks = new MockHandler([
            new Response(200, ['Content-Type' => 'application/json'], file_get_contents(__DIR__ . '/json/users.json')),
        ]);

        $client = $this->getHttpClient($mocks);

        $response = (new GetUsers($this->getAuth(), [
            'httpclient' => $client,
        ]))->getResponse()[0];

        $this->assertEquals($response->{$getter}(), $value);
    }

}
