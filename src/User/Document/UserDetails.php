<?php
namespace Lsv\Timeharvest\User\Document;

class UserDetails
{

    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $email;

    /**
     * @var \DateTime
     */
    protected $createdAt;

    /**
     * @var bool
     */
    protected $isAdmin;

    /**
     * @var string
     */
    protected $firstName;

    /**
     * @var string
     */
    protected $lastName;

    /**
     * @var string
     */
    protected $timezone;

    /**
     * @var bool
     */
    protected $isContractor;

    /**
     * @var string
     */
    protected $telephone;

    /**
     * @var bool
     */
    protected $isActive;

    /**
     * @var bool
     */
    protected $hasAccessToAllFutureProjects;

    /**
     * @var float
     */
    protected $defaultHourlyRate;

    /**
     * @var string
     */
    protected $department;

    /**
     * @var bool
     */
    protected $wantsNewsletter;

    /**
     * @var \DateTime
     */
    protected $updatedAt;

    /**
     * @var float
     */
    protected $costRate;

    /**
     * @var int
     */
    protected $identityAccountId;

    /**
     * @var int
     */
    protected $identityUserId;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return UserDetails
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
     * @return UserDetails
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTime $createdAt
     * @return UserDetails
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isIsAdmin()
    {
        return $this->isAdmin;
    }

    /**
     * @param boolean $isAdmin
     * @return UserDetails
     */
    public function setIsAdmin($isAdmin)
    {
        $this->isAdmin = $isAdmin;
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
     * @return UserDetails
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
     * @return UserDetails
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
        return $this;
    }

    /**
     * @return string
     */
    public function getTimezone()
    {
        return $this->timezone;
    }

    /**
     * @param string $timezone
     * @return UserDetails
     */
    public function setTimezone($timezone)
    {
        $this->timezone = $timezone;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isIsContractor()
    {
        return $this->isContractor;
    }

    /**
     * @param boolean $isContractor
     * @return UserDetails
     */
    public function setIsContractor($isContractor)
    {
        $this->isContractor = $isContractor;
        return $this;
    }

    /**
     * @return string
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * @param string $telephone
     * @return UserDetails
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isIsActive()
    {
        return $this->isActive;
    }

    /**
     * @param boolean $isActive
     * @return UserDetails
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isHasAccessToAllFutureProjects()
    {
        return $this->hasAccessToAllFutureProjects;
    }

    /**
     * @param boolean $hasAccessToAllFutureProjects
     * @return UserDetails
     */
    public function setHasAccessToAllFutureProjects($hasAccessToAllFutureProjects)
    {
        $this->hasAccessToAllFutureProjects = $hasAccessToAllFutureProjects;
        return $this;
    }

    /**
     * @return float
     */
    public function getDefaultHourlyRate()
    {
        return $this->defaultHourlyRate;
    }

    /**
     * @param float $defaultHourlyRate
     * @return UserDetails
     */
    public function setDefaultHourlyRate($defaultHourlyRate)
    {
        $this->defaultHourlyRate = $defaultHourlyRate;
        return $this;
    }

    /**
     * @return string
     */
    public function getDepartment()
    {
        return $this->department;
    }

    /**
     * @param string $department
     * @return UserDetails
     */
    public function setDepartment($department)
    {
        $this->department = $department;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isWantsNewsletter()
    {
        return $this->wantsNewsletter;
    }

    /**
     * @param boolean $wantsNewsletter
     * @return UserDetails
     */
    public function setWantsNewsletter($wantsNewsletter)
    {
        $this->wantsNewsletter = $wantsNewsletter;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @param \DateTime $updatedAt
     * @return UserDetails
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }

    /**
     * @return float
     */
    public function getCostRate()
    {
        return $this->costRate;
    }

    /**
     * @param float $costRate
     * @return UserDetails
     */
    public function setCostRate($costRate)
    {
        $this->costRate = $costRate;
        return $this;
    }

    /**
     * @return int
     */
    public function getIdentityAccountId()
    {
        return $this->identityAccountId;
    }

    /**
     * @param int $identityAccountId
     * @return UserDetails
     */
    public function setIdentityAccountId($identityAccountId)
    {
        $this->identityAccountId = $identityAccountId;
        return $this;
    }

    /**
     * @return int
     */
    public function getIdentityUserId()
    {
        return $this->identityUserId;
    }

    /**
     * @param int $identityUserId
     * @return UserDetails
     */
    public function setIdentityUserId($identityUserId)
    {
        $this->identityUserId = $identityUserId;
        return $this;
    }
}
