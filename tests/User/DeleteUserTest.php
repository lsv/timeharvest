<?php
namespace Lsv\TimeharvestTest\User;

use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\Psr7\Response;
use Lsv\Timeharvest\User\DeleteUser;
use Lsv\TimeharvestTest\AbstractTimeHarvestTest;

class DeleteUserTest extends AbstractTimeHarvestTest
{

    public function test_can_delete_user()
    {
        $mocks = new MockHandler([
            new Response(200),
        ]);

        $action = new DeleteUser($this->getAuth(), [
            'httpclient' => $this->getHttpClient($mocks),
            'user' => 4321,
        ]);

        $response = $action->getResponse();
        $this->assertEquals(4321, $response);
    }

    public function test_can_not_delete_user()
    {
        $mocks = new MockHandler([
            new Response(204),
        ]);

        $action = new DeleteUser($this->getAuth(), [
            'httpclient' => $this->getHttpClient($mocks),
            'user' => 234,
        ]);

        $response = $action->getResponse();
        $this->assertEquals('User not deleted, maybe archive the user instead', $response);
    }

}
