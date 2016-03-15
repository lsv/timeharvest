<?php
namespace Lsv\TimeharvestTest\User;

use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\Psr7\Response;
use JMS\Serializer\SerializerBuilder;
use Lsv\Timeharvest\User\Document\CreateUser\CreateUser;
use Lsv\Timeharvest\User\Document\CreateUser\CreateUserDetails;
use Lsv\TimeharvestTest\AbstractTimeHarvestTest;

class CreateUserTimeHarvestTest extends AbstractTimeHarvestTest
{

    public function test_create_user_serializer()
    {
        $details = new CreateUserDetails();
        $details
            ->setEmail('myemail@mail.com')
            ->setFirstname('firstname')
            ->setLastname('lastname')
            ->setAdmin(true)
            ->setContractor(true)
            ->setTelephone('10203040')
            ->setActive(true)
            ->setFutureprojects(true)
            ->setTimezone('Europe/Paris')
            ->setHourlyrate(30.65)
            ->setDepartment('devs')
            ->setCostrate(25.22)
        ;

        $this->assertEquals('myemail@mail.com', $details->getEmail());
        $this->assertEquals('firstname', $details->getFirstname());
        $this->assertEquals('lastname', $details->getLastname());
        $this->assertTrue($details->isAdmin());
        $this->assertTrue($details->isContractor());
        $this->assertEquals('10203040', $details->getTelephone());
        $this->assertTrue($details->isActive());
        $this->assertTrue($details->isFutureprojects());
        $this->assertEquals('Europe/Paris', $details->getTimezone());
        $this->assertEquals(30.65, $details->getHourlyrate());
        $this->assertEquals('devs', $details->getDepartment());
        $this->assertEquals(25.22, $details->getCostrate());

        $serializer = SerializerBuilder::create()->build();
        $serialized = $serializer->serialize((new CreateUser())->setUser($details), 'json');
        $jsonArray = json_decode($serialized, true);

        $this->assertArrayHasKey('user', $jsonArray);

        $this->assertArrayHasKey('email', $jsonArray['user']);
        $this->assertArrayHasKey('is_admin', $jsonArray['user']);
        $this->assertArrayHasKey('first_name', $jsonArray['user']);
        $this->assertArrayHasKey('last_name', $jsonArray['user']);
        $this->assertArrayHasKey('timezone', $jsonArray['user']);
        $this->assertArrayHasKey('is_contractor', $jsonArray['user']);
        $this->assertArrayHasKey('is_active', $jsonArray['user']);
        $this->assertArrayHasKey('has_access_to_all_future_projects', $jsonArray['user']);
        $this->assertArrayHasKey('default_hourly_rate', $jsonArray['user']);
        $this->assertArrayHasKey('department', $jsonArray['user']);
        $this->assertArrayHasKey('cost_rate', $jsonArray['user']);

    }

    /**
     * @depends test_create_user_serializer
     */
    public function test_can_create_user()
    {
        $mocks = new MockHandler([
            new Response(201),
        ]);

        $action = new \Lsv\Timeharvest\User\CreateUser($this->getAuth(), [
            'httpclient' => $this->getHttpClient($mocks),
            'email' => 'foo@bar.baz',
            'firstname' => 'Foo',
            'lastname' => 'Bar'
        ]);

        $response = $action->getResponse();
        $this->assertInstanceOf(CreateUserDetails::class, $response);
    }

    /**
     * @depends test_create_user_serializer
     * @expectedException \Lsv\Timeharvest\Exceptions\Exception
     */
    public function test_can_not_create_user()
    {
        $mocks = new MockHandler([
            new Response(202),
        ]);

        $action = new \Lsv\Timeharvest\User\CreateUser($this->getAuth(), [
            'httpclient' => $this->getHttpClient($mocks),
            'email' => 'foo@bar.baz',
            'firstname' => 'Foo',
            'lastname' => 'Bar'
        ]);

        $response = $action->getResponse();
        $this->assertEquals('User not created', $response);
    }

}
