<?php
namespace Lsv\Timeharvest\User\Document\UpdateUser;

use JMS\Serializer\Annotation as S;

class UpdateUserSetter
{

    /**
     * @var UpdateUser
     * @S\Type("Lsv\Timeharvest\User\Document\UpdateUser\UpdateUser")
     * @S\SerializedName("user")
     */
    protected $user;

    /**
     * @param UpdateUser $user
     * @return UpdateUserSetter
     */
    public function setUser(UpdateUser $user)
    {
        $this->user = $user;
        return $this;
    }
}
