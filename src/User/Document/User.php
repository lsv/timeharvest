<?php
namespace Lsv\Timeharvest\User\Document;

class User
{

    /**
     * @var UserDetails
     */
    protected $user;

    /**
     * @return UserDetails
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param UserDetails $user
     * @return User
     */
    public function setUser($user)
    {
        $this->user = $user;
        return $this;
    }
}
