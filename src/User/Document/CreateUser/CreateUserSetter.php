<?php
namespace Lsv\Timeharvest\User\Document\CreateUser;

use JMS\Serializer\Annotation as S;

/**
 * Class CreateUserSetter
 * @package Lsv\Timeharvest\User\Document\CreateUserSetter
 */
class CreateUserSetter
{

    /**
     * @var CreateUser
     * @S\Type("Lsv\Timeharvest\User\Document\CreateUser\CreateUser")
     * @S\SerializedName("user")
     */
    protected $user;

    /**
     * @return CreateUser
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param CreateUser $user
     * @return CreateUserSetter
     */
    public function setUser($user)
    {
        $this->user = $user;
        return $this;
    }
}
