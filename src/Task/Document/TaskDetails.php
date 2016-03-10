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

namespace Lsv\Timeharvest\Task\Document;

use Lsv\Timeharvest\DocumentInterface;

/**
 * Task details
 * @package Lsv\Timeharvest\Task\Document
 */
class TaskDetails implements DocumentInterface
{

    /**
     * Task ID
     * @var int
     */
    protected $id;

    /**
     * Task name
     * @var string
     */
    protected $name;

    /**
     * is billable default
     * @var boolean
     */
    protected $billableByDefault;

    /**
     * Task created
     * @var \DateTime
     */
    protected $createdAt;

    /**
     * Task updated
     * @var \DateTime
     */
    protected $updatedAt;

    /**
     * Is the task the default task
     * @var boolean
     */
    protected $isDefault;

    /**
     * task hourly rate
     * @var float
     */
    protected $defaultHourlyRate;

    /**
     * Is the task deactivated
     * @var boolean
     */
    protected $deactivated;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return TaskDetails
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return TaskDetails
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isBillableByDefault()
    {
        return $this->billableByDefault;
    }

    /**
     * @param boolean $billableByDefault
     * @return TaskDetails
     */
    public function setBillableByDefault($billableByDefault)
    {
        $this->billableByDefault = $billableByDefault;
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
     * @return TaskDetails
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
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
     * @return TaskDetails
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isIsDefault()
    {
        return $this->isDefault;
    }

    /**
     * @param boolean $isDefault
     * @return TaskDetails
     */
    public function setIsDefault($isDefault)
    {
        $this->isDefault = $isDefault;
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
     * @return TaskDetails
     */
    public function setDefaultHourlyRate($defaultHourlyRate)
    {
        $this->defaultHourlyRate = $defaultHourlyRate;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isDeactivated()
    {
        return $this->deactivated;
    }

    /**
     * @param boolean $deactivated
     * @return TaskDetails
     */
    public function setDeactivated($deactivated)
    {
        $this->deactivated = $deactivated;
        return $this;
    }
}
