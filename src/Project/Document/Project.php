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

/**
 * Project placeholder
 * @package Lsv\Timeharvest\Project\Document
 */
class Project
{

    /**
     * @var ProjectDetails
     */
    protected $project;

    /**
     * @return ProjectDetails
     */
    public function getProject()
    {
        return $this->project;
    }

    /**
     * @param ProjectDetails $project
     * @return Project
     */
    public function setProject($project)
    {
        $this->project = $project;
        return $this;
    }
}
