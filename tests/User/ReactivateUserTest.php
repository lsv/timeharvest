<?php
namespace Lsv\TimeharvestTest\User;

use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\Psr7\Response;
use Lsv\Timeharvest\User\Document\UserDetails;
use Lsv\Timeharvest\User\ReactivateUser;
use Lsv\TimeharvestTest\AbstractTimeHarvestTest;

class ReactivateUserTest extends AbstractTimeHarvestTest
{

    public function test_can_reactivate_user_userobject()
    {
        $mocks = new MockHandler([
            new Response(200),
        ]);

        $action = new ReactivateUser($this->getAuth(), [
            'httpclient' => $this->getHttpClient($mocks),
            'user' => (new UserDetails())->setId(1234),
        ]);

        $response = $action->getResponse();
        $this->assertEquals('User activated or deactivated', $response);
    }

    public function test_can_reactivate_user()
    {
        $mocks = new MockHandler([
            new Response(200),
        ]);

        $action = new ReactivateUser($this->getAuth(), [
            'httpclient' => $this->getHttpClient($mocks),
            'user' => 4321,
        ]);

        $response = $action->getResponse();
        $this->assertEquals('User activated or deactivated', $response);
    }

    public function test_can_not_reactivate_user()
    {
        $mocks = new MockHandler([
            new Response(400),
        ]);

        $action = new ReactivateUser($this->getAuth(), [
            'httpclient' => $this->getHttpClient($mocks),
            'user' => 4321,
        ]);

        $response = $action->getResponse();
        $this->assertEquals('User could not be activated or deactivated', $response);
    }

}
