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

/**
 * Task placeholder
 * @package Lsv\Timeharvest\Task\Document
 */
class Task
{

    /**
     * @var TaskDetails
     */
    protected $task;

    /**
     * @return TaskDetails
     */
    public function getTask()
    {
        return $this->task;
    }

    /**
     * @param TaskDetails $task
     * @return Task
     */
    public function setTask($task)
    {
        $this->task = $task;
        return $this;
    }
}
