<?php

/*
 * This file is part of Lsv\Timeharvest package.
 *
 * (c) Martin Aarhof <martin.aarhof@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */

namespace Lsv\Timeharvest\Me\Document;

use Lsv\Timeharvest\DocumentInterface;

/**
 * Class Me
 * @package Lsv\Timeharvest\Me\Document
 */
class Me implements DocumentInterface
{

    /**
     * Company
     * @var Company
     */
    protected $company;

    /**
     * User
     * @var User
     */
    protected $user;

    /**
     * @return Company
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * @param Company $company
     * @return Me
     */
    public function setCompany($company)
    {
        $this->company = $company;
        return $this;
    }

    /**
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param User $user
     * @return Me
     */
    public function setUser($user)
    {
        $this->user = $user;
        return $this;
    }
}
