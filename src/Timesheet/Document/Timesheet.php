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

namespace Lsv\Timeharvest\Timesheet\Document;

use Lsv\Timeharvest\DocumentInterface;

/**
 * Timesheet
 * @package Lsv\Timeharvest\Timesheet\Document
 */
class Timesheet implements DocumentInterface
{

    /**
     * Project ID
     * @var int
     */
    protected $projectId;

    /**
     * project name
     * @var string
     */
    protected $project;

    /**
     * user id
     * @var int
     */
    protected $userId;

    /**
     * which day is the timesheet added to
     * @var \DateTime
     */
    protected $spentAt;

    /**
     * task id
     * @var int
     */
    protected $taskId;

    /**
     * task name
     * @var string
     */
    protected $task;

    /**
     * client name
     * @var string
     */
    protected $client;

    /**
     * timesheet id
     * @var int
     */
    protected $id;

    /**
     * notes
     * @var string
     */
    protected $notes;

    /**
     * timesheet created
     * @var \DateTime
     */
    protected $createdAt;

    /**
     * timesheet updated
     * @var \DateTime
     */
    protected $updatedAt;

    /**
     * hours without timer
     * @var float
     */
    protected $hoursWithoutTimer;

    /**
     * hours
     * @var float
     */
    protected $hours;

    /**
     * @return int
     */
    public function getProjectId()
    {
        return $this->projectId;
    }

    /**
     * @param int $projectId
     * @return Timesheet
     */
    public function setProjectId($projectId)
    {
        $this->projectId = $projectId;
        return $this;
    }

    /**
     * @return string
     */
    public function getProject()
    {
        return $this->project;
    }

    /**
     * @param string $project
     * @return Timesheet
     */
    public function setProject($project)
    {
        $this->project = $project;
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
     * @return Timesheet
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
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
     * @return Timesheet
     */
    public function setSpentAt($spentAt)
    {
        $this->spentAt = $spentAt;
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
     * @return Timesheet
     */
    public function setTaskId($taskId)
    {
        $this->taskId = $taskId;
        return $this;
    }

    /**
     * @return string
     */
    public function getTask()
    {
        return $this->task;
    }

    /**
     * @param string $task
     * @return Timesheet
     */
    public function setTask($task)
    {
        $this->task = $task;
        return $this;
    }

    /**
     * @return string
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * @param string $client
     * @return Timesheet
     */
    public function setClient($client)
    {
        $this->client = $client;
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
     * @return Timesheet
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
     * @return Timesheet
     */
    public function setNotes($notes)
    {
        $this->notes = $notes;
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
     * @return Timesheet
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
     * @return Timesheet
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }

    /**
     * @return float
     */
    public function getHoursWithoutTimer()
    {
        return $this->hoursWithoutTimer;
    }

    /**
     * @param float $hoursWithoutTimer
     * @return Timesheet
     */
    public function setHoursWithoutTimer($hoursWithoutTimer)
    {
        $this->hoursWithoutTimer = $hoursWithoutTimer;
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
     * @return Timesheet
     */
    public function setHours($hours)
    {
        $this->hours = $hours;
        return $this;
    }
}
