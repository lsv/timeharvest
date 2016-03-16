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
class ProjectSetter
{

    /**
     * @var Project
     */
    protected $project;

    /**
     * @return Project
     */
    public function getProject()
    {
        return $this->project;
    }

    /**
     * @param Project $project
     * @return ProjectSetter
     */
    public function setProject($project)
    {
        $this->project = $project;
        return $this;
    }
}
