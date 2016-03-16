<?php
namespace Lsv\Timeharvest\User\Document\CreateUser;

use JMS\Serializer\Annotation as S;

class CreateUser
{

    /**
     * @var string
     * @S\Type("string")
     * @S\SerializedName("email")
     */
    protected $email;

    /**
     * @var string
     * @S\Type("string")
     * @S\SerializedName("first_name")
     */
    protected $firstname;

    /**
     * @var string
     * @S\Type("string")
     * @S\SerializedName("last_name")
     */
    protected $lastname;

    /**
     * @var bool
     * @S\Type("boolean")
     * @S\SerializedName("is_admin")
     */
    protected $admin;

    /**
     * @var string
     * @S\Type("string")
     * @S\SerializedName("timezone")
     */
    protected $timezone;

    /**
     * @var bool
     * @S\Type("boolean")
     * @S\SerializedName("is_contractor")
     */
    protected $contractor;

    /**
     * @var string
     * @S\Type("string")
     * @S\SerializedName("telephone")
     */
    protected $telephone;

    /**
     * @var bool
     * @S\Type("boolean")
     * @S\SerializedName("is_active")
     */
    protected $active;

    /**
     * @var bool
     * @S\Type("boolean")
     * @S\SerializedName("has_access_to_all_future_projects")
     */
    protected $futureprojects;

    /**
     * @var float
     * @S\Type("float")
     * @S\SerializedName("default_hourly_rate")
     */
    protected $hourlyrate;

    /**
     * @var string
     * @S\Type("string")
     * @S\SerializedName("department")
     */
    protected $department;

    /**
     * @var float
     * @S\Type("float")
     * @S\SerializedName("cost_rate")
     */
    protected $costrate;

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return CreateUser
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * @param string $firstname
     * @return CreateUser
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
        return $this;
    }

    /**
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * @param string $lastname
     * @return CreateUser
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
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
     * @return CreateUser
     */
    public function setAdmin($admin)
    {
        $this->admin = $admin;
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
     * @return CreateUser
     */
    public function setTimezone($timezone)
    {
        $this->timezone = $timezone;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isContractor()
    {
        return $this->contractor;
    }

    /**
     * @param boolean $contractor
     * @return CreateUser
     */
    public function setContractor($contractor)
    {
        $this->contractor = $contractor;
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
     * @return CreateUser
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isActive()
    {
        return $this->active;
    }

    /**
     * @param boolean $active
     * @return CreateUser
     */
    public function setActive($active)
    {
        $this->active = $active;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isFutureprojects()
    {
        return $this->futureprojects;
    }

    /**
     * @param boolean $futureprojects
     * @return CreateUser
     */
    public function setFutureprojects($futureprojects)
    {
        $this->futureprojects = $futureprojects;
        return $this;
    }

    /**
     * @return float
     */
    public function getHourlyrate()
    {
        return $this->hourlyrate;
    }

    /**
     * @param float $hourlyrate
     * @return CreateUser
     */
    public function setHourlyrate($hourlyrate)
    {
        $this->hourlyrate = $hourlyrate;
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
     * @return CreateUser
     */
    public function setDepartment($department)
    {
        $this->department = $department;
        return $this;
    }

    /**
     * @return float
     */
    public function getCostrate()
    {
        return $this->costrate;
    }

    /**
     * @param float $costrate
     * @return CreateUser
     */
    public function setCostrate($costrate)
    {
        $this->costrate = $costrate;
        return $this;
    }
}
