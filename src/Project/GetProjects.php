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
use Lsv\Timeharvest\Client\Document\ClientDetails;
use Lsv\Timeharvest\Project\Document\Project;
use Lsv\Timeharvest\Project\Document\ProjectDetails;
use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * List projects
 * @package Lsv\Timeharvest\Project
 */
class GetProjects extends AbstractTimeharvest
{

    /**
     * {@inheritdoc}
     * @return ProjectDetails[]
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
        $resolver->setDefault('client', null);
        $resolver->setAllowedTypes('client', ['null', 'int', ClientDetails::class]);
        $resolver->setNormalizer('client', function (Options $options, $value) {
            if ($value instanceof ClientDetails) {
                return $value->getId();
            }
            return null;
        });

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
        $query = [];
        if ($options['updated']) {
            $query[] = 'updated_since=' . urlencode($options['updated']);
        }

        if ($options['client']) {
            $query[] = 'client_id=' . $options['client'];
        }

        if ($query) {
            return sprintf('projects?%s', implode('&', $query));
        }

        return 'projects';
    }

    /**
     * {@inheritdoc}
     */
    protected function getDocumentClass()
    {
        return new Project();
    }

    /**
     * {@inheritdoc}
     */
    protected function afterParseData(&$data)
    {
        $output = [];
        /** @var Project $item */
        foreach ($data as $item) {
            $output[] = $item->getProject();
        }
        $data = $output;
    }
}
