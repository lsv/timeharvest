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

namespace Lsv\Timeharvest\Project;

use Lsv\Timeharvest\AbstractTimeharvest;
use Lsv\Timeharvest\Client\Document\Client;
use Lsv\Timeharvest\Project\Document\ProjectSetter;
use Lsv\Timeharvest\Project\Document\Project;
use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Get project details
 * @package Lsv\Timeharvest\Project
 */
class GetProject extends AbstractTimeharvest
{

    /**
     * {@inheritdoc}
     * @return Client
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
        $resolver->setRequired('project');
        $resolver->setAllowedTypes('project', ['int', Project::class]);
        $resolver->setNormalizer('project', function (Options $options, $value) {
            if ($value instanceof Project) {
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
        return sprintf('projects/%d', $options['project']);
    }

    /**
     * {@inheritdoc}
     */
    protected function getDocumentClass()
    {
        return new ProjectSetter();
    }

    /**
     * {@inheritdoc}
     */
    protected function afterParseData(&$data)
    {
        /** @var ProjectSetter $data */
        $data = $data->getProject();
    }
}
