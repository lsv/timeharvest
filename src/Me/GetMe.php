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

namespace Lsv\Timeharvest\Me;

use Lsv\Timeharvest\AbstractTimeharvest;
use Lsv\Timeharvest\Me\Document\Me;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Get user
 * @package Lsv\Timeharvest\User
 */
class GetMe extends AbstractTimeharvest
{

    /**
     * {@inheritdoc}
     * @return Me
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
    }

    /**
     * {@inheritdoc}
     */
    protected function getUrl(array $options)
    {
        return 'account/who_am_i';
    }

    /**
     * {@inheritdoc}
     */
    protected function getDocumentClass()
    {
        return new Me();
    }
}
