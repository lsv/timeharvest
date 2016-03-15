<?php
namespace Lsv\TimeharvestTest\Me;

use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\Psr7\Response;
use Lsv\Timeharvest\Me\Document\UserDetail;
use Lsv\Timeharvest\Me\GetMe;
use Lsv\TimeharvestTest\AbstractTimeHarvestTest;

class GetUserTimeHarvestTest extends AbstractTimeHarvestTest
{

    public function test_get_user()
    {
        $mocks = new MockHandler([
            new Response(200, ['Content-Type' => 'application/json'], file_get_contents(__DIR__ . '/json/user.json')),
        ]);

        $action = new GetMe($this->getAuth(), [
            'httpclient' => $this->getHttpClient($mocks)
        ]);

        $response = $action->getResponse();
        $request = $action->getRequest();

        $this->assertInstanceOf(UserDetail::class, $response);
        $this->assertEquals('/account/who_am_i', $request->getUri()->getPath());
    }

    public function dataProviderUser()
    {
        return [
            ['getTimezone', "Eastern Time (US & Canada)"],
            ['getTimezoneIdentifier', "America/New_York"],
            ['getTimezoneUtcOffset', -18000],
            ['getId', 508343],
            ['getEmail', "support@getharvest.com"],
            ['isAdmin', true],
            ['getFirstName', "Test"],
            ['getLastName', "User"],
            ['getAvatarUrl', "/assets/profile_images/big_ben.png?14405182"],
            ['getProjectManager', [
                'is_project_manager' => true,
                'can_see_rates' => true,
                'can_create_projects' => true,
                'can_create_invoices' => true
            ]],
            ['isTimestampTimers', false],
        ];
    }

    /**
     * @dataProvider dataProviderUser
     * @param string $getter
     * @param mixed $value
     */
    public function test_user_details($getter, $value)
    {
        $mocks = new MockHandler([
            new Response(200, ['Content-Type' => 'application/json'], file_get_contents(__DIR__ . '/json/user.json')),
        ]);

        $action = new GetMe($this->getAuth(), [
            'httpclient' => $this->getHttpClient($mocks)
        ]);

        $response = $action->getResponse()->getUser();
        $this->assertEquals($value, $response->{$getter}());
    }

    public function dataProviderCompany()
    {
        return [
            ['getBaseUri', "https://youraccount.harvestapp.com"],
            ['getFullDomain', "youraccount.harvestapp.com"],
            ['getName', "Your Harvest Account"],
            ['isActive', true],
            ['getWeekStartDay', "Monday"],
            ['getTimeFormat', "decimal"],
            ['getClock', "12h"],
            ['getDecimalSymbol', "."],
            ['getColorScheme', "orange"],
            ['getModules', [
                'expenses' => true,
                'invoices' => true,
                'estimates' => true,
                'approval' => true
            ]],
            ['getThousandsSeparator', ','],
            ['getPlanType', 'trial'],
        ];
    }

    /**
     * @dataProvider dataProviderCompany
     * @param string $getter
     * @param mixed $value
     */
    public function test_company_details($getter, $value)
    {
        $mocks = new MockHandler([
            new Response(200, ['Content-Type' => 'application/json'], file_get_contents(__DIR__ . '/json/user.json')),
        ]);

        $action = new GetMe($this->getAuth(), [
            'httpclient' => $this->getHttpClient($mocks)
        ]);

        $response = $action->getResponse()->getCompany();
        $this->assertEquals($value, $response->{$getter}());
    }

}
