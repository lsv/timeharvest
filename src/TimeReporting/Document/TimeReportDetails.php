<?php
namespace Lsv\Timeharvest\TimeReporting\Document;

class TimeReportDetails
{

    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $notes;

    /**
     * @var \DateTime
     */
    protected $spentAt;

    /**
     * @var float
     */
    protected $hours;

    /**
     * @var int
     */
    protected $userId;

    /**
     * @var int
     */
    protected $projectId;

    /**
     * @var int
     */
    protected $taskId;

    /**
     * @var \DateTime
     */
    protected $createdAt;

    /**
     * @var \DateTime
     */
    protected $updatedAt;

    /**
     * @var bool
     */
    protected $adjustmentRecord;

    /**
     * @var \DateTime
     */
    protected $timerStartedAt;

    /**
     * @var bool
     */
    protected $isClosed;

    /**
     * @var bool
     */
    protected $isBilled;

    /**
     * @var float
     */
    protected $hoursWithTimer;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return TimeReportDetails
     */
    public function setId($id)
    {
        $this->id = $id;
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
     * @return TimeReportDetails
     */
    public function setNotes($notes)
    {
        $this->notes = $notes;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getSpentAt()
    {
        return $this->spentAt;
    }

    /**
     * @param \DateTime $spentAt
     * @return TimeReportDetails
     */
    public function setSpentAt($spentAt)
    {
        $this->spentAt = $spentAt;
        return $this;
    }

    /**
     * @return float
     */
    public function getHours()
    {
        return $this->hours;
    }

    /**
     * @param float $hours
     * @return TimeReportDetails
     */
    public function setHours($hours)
    {
        $this->hours = $hours;
        return $this;
    }

    /**
     * @return int
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param int $userId
     * @return TimeReportDetails
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
        return $this;
    }

    /**
     * @return int
     */
    public function getProjectId()
    {
        return $this->projectId;
    }

    /**
     * @param int $projectId
     * @return TimeReportDetails
     */
    public function setProjectId($projectId)
    {
        $this->projectId = $projectId;
        return $this;
    }

    /**
     * @return int
     */
    public function getTaskId()
    {
        return $this->taskId;
    }

    /**
     * @param int $taskId
     * @return TimeReportDetails
     */
    public function setTaskId($taskId)
    {
        $this->taskId = $taskId;
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
     * @return TimeReportDetails
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
     * @return TimeReportDetails
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isAdjustmentRecord()
    {
        return $this->adjustmentRecord;
    }

    /**
     * @param boolean $adjustmentRecord
     * @return TimeReportDetails
     */
    public function setAdjustmentRecord($adjustmentRecord)
    {
        $this->adjustmentRecord = $adjustmentRecord;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getTimerStartedAt()
    {
        return $this->timerStartedAt;
    }

    /**
     * @param \DateTime $timerStartedAt
     * @return TimeReportDetails
     */
    public function setTimerStartedAt($timerStartedAt)
    {
        $this->timerStartedAt = $timerStartedAt;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isIsClosed()
    {
        return $this->isClosed;
    }

    /**
     * @param boolean $isClosed
     * @return TimeReportDetails
     */
    public function setIsClosed($isClosed)
    {
        $this->isClosed = $isClosed;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isIsBilled()
    {
        return $this->isBilled;
    }

    /**
     * @param boolean $isBilled
     * @return TimeReportDetails
     */
    public function setIsBilled($isBilled)
    {
        $this->isBilled = $isBilled;
        return $this;
    }

    /**
     * @return float
     */
    public function getHoursWithTimer()
    {
        return $this->hoursWithTimer;
    }

    /**
     * @param float $hoursWithTimer
     * @return TimeReportDetails
     */
    public function setHoursWithTimer($hoursWithTimer)
    {
        $this->hoursWithTimer = $hoursWithTimer;
        return $this;
    }
}
