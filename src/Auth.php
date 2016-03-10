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

namespace Lsv\Timeharvest;

/**
 * Authenticator class
 * @package Lsv\Timeharvest
 */
class Auth
{

    /**
     * Username
     * @var string
     */
    private $username;

    /**
     * Password
     * @var string
     */
    private $password;

    /**
     * Account
     * @var string
     */
    private $account;

    /**
     * Auth constructor.
     * @param string $username Username
     * @param string $password Password
     * @param string $account Account
     */
    public function __construct($username, $password, $account)
    {
        $this->username = $username;
        $this->password = $password;
        $this->account = $account;
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @return string
     */
    public function getAccount()
    {
        return $this->account;
    }
}
