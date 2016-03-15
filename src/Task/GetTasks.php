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
use Lsv\Timeharvest\Task\Document\Task;
use Lsv\Timeharvest\Task\Document\TaskDetails;
use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * List tasks
 * @package Lsv\Timeharvest\Task
 */
class GetTasks extends AbstractTimeharvest
{

    /**
     * {@inheritdoc}
     * @return TaskDetails[]
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
        $resolver->setDefault('updated', null);
        $resolver->setAllowedTypes('updated', ['null', \DateTime::class]);
        $resolver->setNormalizer('updated', function (Options $options, $value) {
            if ($value instanceof \DateTime) {
                return $value->format('Y-m-d H:i');
            }
            return null;
        });
        return $resolver;
    }

    /**
     * {@inheritdoc}
     */
    protected function getUrl(array $options)
    {
        if ($options['updated']) {
            return 'tasks?updated_since=' . urlencode($options['updated']);
        }

        return 'tasks';
    }

    /**
     * {@inheritdoc}
     */
    protected function getDocumentClass()
    {
        return new Task();
    }

    /**
     * {@inheritdoc}
     */
    protected function afterParseData(&$data)
    {
        $output = [];
        /** @var Task $item */
        foreach ($data as $item) {
            $output[] = $item->getTask();
        }
        $data = $output;
    }
}
