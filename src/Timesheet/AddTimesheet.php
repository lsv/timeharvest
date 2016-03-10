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

namespace Lsv\Timeharvest\Timesheet;

use Lsv\Timeharvest\AbstractTimeharvest;
use Lsv\Timeharvest\DocumentInterface;
use Lsv\Timeharvest\Project\Document\ProjectDetails;
use Lsv\Timeharvest\Task\Document\TaskDetails;
use Lsv\Timeharvest\Timesheet\Document\Timesheet;
use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Create timesheet
 * @package Lsv\Timeharvest\Timesheet
 */
class AddTimesheet extends AbstractTimeharvest
{

    /**
     * Options to resolve to json
     * @var array
     */
    private $optionToJson = [
        'hours' => 'hours',
        'project' => 'project_id',
        'task' => 'task_id',
        'day' => 'spent_at'
    ];

    /**
     * {@inheritdoc}
     * @return Timesheet
     */
    public function getResponse()
    {
        return $this->doResponse();
    }

    /**
     * {@inheritdoc}
     */
    protected function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefault('_method', 'POST');

        $resolver->setRequired('hours');
        $resolver->addAllowedTypes('hours', ['int', 'float']);

        $resolver->setRequired('project');
        $resolver->addAllowedTypes('project', ['int', ProjectDetails::class]);
        $resolver->setNormalizer('project', function (Options $option, $value) {
            if ($value instanceof ProjectDetails) {
                return $value->getId();
            }
            return $value;
        });

        $resolver->setRequired('task');
        $resolver->addAllowedTypes('task', ['int', TaskDetails::class]);
        $resolver->setNormalizer('task', function (Options $option, $value) {
            if ($value instanceof TaskDetails) {
                return $value->getId();
            }
            return $value;
        });

        $resolver->setRequired('day');
        $resolver->setDefault('day', new \DateTime());
        $resolver->addAllowedTypes('day', [\DateTime::class]);
        $resolver->setNormalizer('day', function (Options $option, \DateTime $value) {
            return $value->format('Y-m-d');
        });

        $resolver->setDefault('notes', null);
        $resolver->addAllowedTypes('notes', ['string', 'null']);

        return $resolver;
    }

    /**
     * {@inheritdoc}
     */
    protected function getRequestBody(array $options)
    {
        $output = [];
        foreach ($this->optionToJson as $key => $value) {
            $output[$value] = $options[$key];
        }
        return json_encode($output);
    }

    /**
     * @param array $options
     * @return string
     */
    protected function getUrl(array $options)
    {
        return 'daily/add';
    }

    /**
     * @return DocumentInterface
     */
    protected function getDocumentClass()
    {
        return new Timesheet();
    }
}
