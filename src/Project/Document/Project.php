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

namespace Lsv\Timeharvest\Project\Document;

use Lsv\Timeharvest\DocumentInterface;

/**
 * Project details
 * @package Lsv\Timeharvest\Project\Document
 */
class Project implements DocumentInterface
{

    /**
     * Project ID
     * @var int
     */
    protected $id;

    /**
     * Client ID
     * @var int
     */
    protected $clientId;

    /**
     * Project name
     * @var string
     */
    protected $name;

    /**
     * Project code
     * @var string
     */
    protected $code;

    /**
     * is the project active
     * @var boolean
     */
    protected $active;

    /**
     * is the project billable
     * @var boolean
     */
    protected $billable;

    /**
     * which the project is invoiced by
     * @var string
     */
    protected $billBy;

    /**
     * Rate for projects billed by Project Hourly Rate
     * @var float
     */
    protected $hourlyRate;

    /**
     * Budget value for the project.
     * @var float
     */
    protected $budget;

    /**
     * The method by which the project is budgeted by
     * @var string
     */
    protected $budgetBy;

    /**
     * Option to send notification emails when a project reaches the budget threshold
     * @var boolean
     */
    protected $notifyWhenOverBudget;

    /**
     * Percentage value to trigger over budget email alerts.
     * @var float
     */
    protected $overBudgetNotificationPercentage;

    /**
     * Date of last over budget notification.
     * @var null|\DateTime
     */
    protected $overBudgetNotifiedAt;

    /**
     * Option to show project budget to all employees
     * @var boolean
     */
    protected $showBudgetToAll;

    /**
     * Project created
     * @var \DateTime
     */
    protected $createdAt;

    /**
     * Project last updated
     * @var \DateTime
     */
    protected $updatedAt;

    /**
     * Start date of project
     * @var \DateTime
     */
    protected $startsOn;

    /**
     * End date of project
     * @var \DateTime
     */
    protected $endsOn;

    /**
     * Project estimate
     * @var float
     */
    protected $estimate;

    /**
     * Project estimate by
     * @var string
     */
    protected $estimateBy;

    /**
     * Date of earliest record for this project.
     * @var \DateTime
     */
    protected $hintEarliestRecordAt;

    /**
     * Date of most recent record for this project.
     * @var \DateTime
     */
    protected $hintLatestRecordAt;

    /**
     * Project notes
     * @var string
     */
    protected $notes;

    /**
     * Budget value for Total Project Fees projects.
     * @var string
     */
    protected $costBudget;

    /**
     * Option for budget of Total Project Fees projects to include tracked expenses.
     * @var boolean
     */
    protected $costBudgetIncludeExpenses;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Project
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return int
     */
    public function getClientId()
    {
        return $this->clientId;
    }

    /**
     * @param int $clientId
     * @return Project
     */
    public function setClientId($clientId)
    {
        $this->clientId = $clientId;
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
     * @return Project
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param string $code
     * @return Project
     */
    public function setCode($code)
    {
        $this->code = $code;
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
     * @return Project
     */
    public function setActive($active)
    {
        $this->active = $active;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isBillable()
    {
        return $this->billable;
    }

    /**
     * @param boolean $billable
     * @return Project
     */
    public function setBillable($billable)
    {
        $this->billable = $billable;
        return $this;
    }

    /**
     * @return string
     */
    public function getBillBy()
    {
        return $this->billBy;
    }

    /**
     * @param string $billBy
     * @return Project
     */
    public function setBillBy($billBy)
    {
        $this->billBy = $billBy;
        return $this;
    }

    /**
     * @return float
     */
    public function getHourlyRate()
    {
        return $this->hourlyRate;
    }

    /**
     * @param float $hourlyRate
     * @return Project
     */
    public function setHourlyRate($hourlyRate)
    {
        $this->hourlyRate = $hourlyRate;
        return $this;
    }

    /**
     * @return float
     */
    public function getBudget()
    {
        return $this->budget;
    }

    /**
     * @param float $budget
     * @return Project
     */
    public function setBudget($budget)
    {
        $this->budget = $budget;
        return $this;
    }

    /**
     * @return string
     */
    public function getBudgetBy()
    {
        return $this->budgetBy;
    }

    /**
     * @param string $budgetBy
     * @return Project
     */
    public function setBudgetBy($budgetBy)
    {
        $this->budgetBy = $budgetBy;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isNotifyWhenOverBudget()
    {
        return $this->notifyWhenOverBudget;
    }

    /**
     * @param boolean $notifyWhenOverBudget
     * @return Project
     */
    public function setNotifyWhenOverBudget($notifyWhenOverBudget)
    {
        $this->notifyWhenOverBudget = $notifyWhenOverBudget;
        return $this;
    }

    /**
     * @return float
     */
    public function getOverBudgetNotificationPercentage()
    {
        return $this->overBudgetNotificationPercentage;
    }

    /**
     * @param float $overBudgetNotificationPercentage
     * @return Project
     */
    public function setOverBudgetNotificationPercentage($overBudgetNotificationPercentage)
    {
        $this->overBudgetNotificationPercentage = $overBudgetNotificationPercentage;
        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getOverBudgetNotifiedAt()
    {
        return $this->overBudgetNotifiedAt;
    }

    /**
     * @param \DateTime|null $overBudgetNotifiedAt
     * @return Project
     */
    public function setOverBudgetNotifiedAt($overBudgetNotifiedAt)
    {
        $this->overBudgetNotifiedAt = $overBudgetNotifiedAt;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isShowBudgetToAll()
    {
        return $this->showBudgetToAll;
    }

    /**
     * @param boolean $showBudgetToAll
     * @return Project
     */
    public function setShowBudgetToAll($showBudgetToAll)
    {
        $this->showBudgetToAll = $showBudgetToAll;
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
     * @return Project
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
     * @return Project
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getStartsOn()
    {
        return $this->startsOn;
    }

    /**
     * @param \DateTime $startsOn
     * @return Project
     */
    public function setStartsOn($startsOn)
    {
        $this->startsOn = $startsOn;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getEndsOn()
    {
        return $this->endsOn;
    }

    /**
     * @param \DateTime $endsOn
     * @return Project
     */
    public function setEndsOn($endsOn)
    {
        $this->endsOn = $endsOn;
        return $this;
    }

    /**
     * @return float
     */
    public function getEstimate()
    {
        return $this->estimate;
    }

    /**
     * @param float $estimate
     * @return Project
     */
    public function setEstimate($estimate)
    {
        $this->estimate = $estimate;
        return $this;
    }

    /**
     * @return string
     */
    public function getEstimateBy()
    {
        return $this->estimateBy;
    }

    /**
     * @param string $estimateBy
     * @return Project
     */
    public function setEstimateBy($estimateBy)
    {
        $this->estimateBy = $estimateBy;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getHintEarliestRecordAt()
    {
        return $this->hintEarliestRecordAt;
    }

    /**
     * @param \DateTime $hintEarliestRecordAt
     * @return Project
     */
    public function setHintEarliestRecordAt($hintEarliestRecordAt)
    {
        $this->hintEarliestRecordAt = $hintEarliestRecordAt;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getHintLatestRecordAt()
    {
        return $this->hintLatestRecordAt;
    }

    /**
     * @param \DateTime $hintLatestRecordAt
     * @return Project
     */
    public function setHintLatestRecordAt($hintLatestRecordAt)
    {
        $this->hintLatestRecordAt = $hintLatestRecordAt;
        return $this;
    }

    /**
     * @return string
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * @param string $notes
     * @return Project
     */
    public function setNotes($notes)
    {
        $this->notes = $notes;
        return $this;
    }

    /**
     * @return string
     */
    public function getCostBudget()
    {
        return $this->costBudget;
    }

    /**
     * @param string $costBudget
     * @return Project
     */
    public function setCostBudget($costBudget)
    {
        $this->costBudget = $costBudget;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isCostBudgetIncludeExpenses()
    {
        return $this->costBudgetIncludeExpenses;
    }

    /**
     * @param boolean $costBudgetIncludeExpenses
     * @return Project
     */
    public function setCostBudgetIncludeExpenses($costBudgetIncludeExpenses)
    {
        $this->costBudgetIncludeExpenses = $costBudgetIncludeExpenses;
        return $this;
    }
}
