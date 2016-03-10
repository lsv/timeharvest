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

namespace Lsv\Timeharvest\User\Document;

/**
 * User document
 * @package Lsv\Timeharvest\User\Document
 */
class User
{

    /**
     * Timezone
     * @var string
     */
    protected $timezone;

    /**
     * Timezone identifier
     * @var string
     */
    protected $timezoneIdentifier;

    /**
     * Timezone offset
     * @var integer
     */
    protected $timezoneUtcOffset;

    /**
     * user id
     * @var integer
     */
    protected $id;

    /**
     * user email
     * @var string
     */
    protected $email;

    /**
     * is the user admin
     * @var boolean
     */
    protected $admin;

    /**
     * user firstname
     * @var string
     */
    protected $firstName;

    /**
     * user lastname
     * @var string
     */
    protected $lastName;

    /**
     * user avatar url
     * @var string
     */
    protected $avatarUrl;

    /**
     * project manager types
     * @var array
     */
    protected $projectManager;

    /**
     * timestamp timers
     * @var boolean
     */
    protected $timestampTimers;

    /**
     * @return string
     */
    public function getTimezone()
    {
        return $this->timezone;
    }

    /**
     * @param string $timezone
     * @return User
     */
    public function setTimezone($timezone)
    {
        $this->timezone = $timezone;
        return $this;
    }

    /**
     * @return string
     */
    public function getTimezoneIdentifier()
    {
        return $this->timezoneIdentifier;
    }

    /**
     * @param string $timezoneIdentifier
     * @return User
     */
    public function setTimezoneIdentifier($timezoneIdentifier)
    {
        $this->timezoneIdentifier = $timezoneIdentifier;
        return $this;
    }

    /**
     * @return int
     */
    public function getTimezoneUtcOffset()
    {
        return $this->timezoneUtcOffset;
    }

    /**
     * @param int $timezoneUtcOffset
     * @return User
     */
    public function setTimezoneUtcOffset($timezoneUtcOffset)
    {
        $this->timezoneUtcOffset = $timezoneUtcOffset;
        return $this;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return User
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isAdmin()
    {
        return $this->admin;
    }

    /**
     * @param boolean $admin
     * @return User
     */
    public function setAdmin($admin)
    {
        $this->admin = $admin;
        return $this;
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     * @return User
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
        return $this;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     * @return User
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
        return $this;
    }

    /**
     * @return string
     */
    public function getAvatarUrl()
    {
        return $this->avatarUrl;
    }

    /**
     * @param string $avatarUrl
     * @return User
     */
    public function setAvatarUrl($avatarUrl)
    {
        $this->avatarUrl = $avatarUrl;
        return $this;
    }

    /**
     * @return array
     */
    public function getProjectManager()
    {
        return $this->projectManager;
    }

    /**
     * @param array $projectManager
     * @return User
     */
    public function setProjectManager($projectManager)
    {
        $this->projectManager = $projectManager;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isTimestampTimers()
    {
        return $this->timestampTimers;
    }

    /**
     * @param boolean $timestampTimers
     * @return User
     */
    public function setTimestampTimers($timestampTimers)
    {
        $this->timestampTimers = $timestampTimers;
        return $this;
    }
}
