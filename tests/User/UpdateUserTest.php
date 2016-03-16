<?php
namespace Lsv\TimeharvestTest\User;

use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\Psr7\Response;
use Lsv\Timeharvest\User\Document\UserDetails;
use Lsv\Timeharvest\User\UpdateUser;
use Lsv\TimeharvestTest\AbstractTimeHarvestTest;

class UpdateUserTest extends AbstractTimeHarvestTest
{

    public function test_update_user()
    {
        $mocks = new MockHandler([
            new Response(200),
        ]);

        $client = $this->getHttpClient($mocks);

        $user = new UserDetails();

        $getter = new UpdateUser($this->getAuth(), [
            'httpclient' => $client,
            'user' => $user,
        ]);

        $this->assertInstanceOf(UserDetails::class, $getter->getResponse());
    }

    /**
     * @expectedException \Lsv\Timeharvest\Exceptions\Exception
     */
    public function test_update_user_fail()
    {
        $mocks = new MockHandler([
            new Response(400),
        ]);

        $client = $this->getHttpClient($mocks);

        $user = new UserDetails();

        (new UpdateUser($this->getAuth(), [
            'httpclient' => $client,
            'user' => $user,
        ]))->getResponse();
    }

}
