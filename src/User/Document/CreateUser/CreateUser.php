<?php
namespace Lsv\Timeharvest\User\Document\CreateUser;

use JMS\Serializer\Annotation as S;

class CreateUser
{

    /**
     * @var CreateUserDetails
     * @S\Type("Lsv\Timeharvest\User\Document\CreateUser\CreateUserDetails")
     * @S\SerializedName("user")
     */
    protected $user;

    /**
     * @return CreateUserDetails
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param CreateUserDetails $user
     * @return CreateUser
     */
    public function setUser($user)
    {
        $this->user = $user;
        return $this;
    }
}
