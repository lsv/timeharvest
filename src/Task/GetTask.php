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

namespace Lsv\Timeharvest\Task;

use Lsv\Timeharvest\AbstractTimeharvest;
use Lsv\Timeharvest\Task\Document\TaskSetter;
use Lsv\Timeharvest\Task\Document\Task;
use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Get task details
 * @package Lsv\Timeharvest\Task
 */
class GetTask extends AbstractTimeharvest
{

    /**
     * {@inheritdoc}
     * @return Task
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
        $resolver->setRequired('task');
        $resolver->setAllowedTypes('task', ['int', Task::class]);
        $resolver->setNormalizer('task', function (Options $options, $value) {
            if ($value instanceof Task) {
                return $value->getId();
            }
            return $value;
        });
    }

    /**
     * {@inheritdoc}
     */
    protected function getUrl(array $options)
    {
        return sprintf('tasks/%d', $options['task']);
    }

    /**
     * {@inheritdoc}
     */
    protected function getDocumentClass()
    {
        return new TaskSetter();
    }

    /**
     * {@inheritdoc}
     */
    protected function afterParseData(&$data)
    {
        /** @var TaskSetter $data */
        $data = $data->getTask();
    }
}
