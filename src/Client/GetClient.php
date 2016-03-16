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


namespace Lsv\Timeharvest\Client;

use Lsv\Timeharvest\AbstractTimeharvest;
use Lsv\Timeharvest\Client\Document\ClientSetter;
use Lsv\Timeharvest\Client\Document\Client;
use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Get client details
 * @package Lsv\Timeharvest\Client
 */
class GetClient extends AbstractTimeharvest
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
        $resolver->setRequired('client');
        $resolver->setAllowedTypes('client', ['int', Client::class]);
        $resolver->setNormalizer('client', function (Options $options, $value) {
            if ($value instanceof Client) {
                return $value->getId();
            }
            return $value;
        });
        return $resolver;
    }

    /**
     * {@inheritdoc}
     */
    protected function getUrl(array $options)
    {
        return sprintf('clients/%d', $options['client']);
    }

    /**
     * {@inheritdoc}
     */
    protected function getDocumentClass()
    {
        return new ClientSetter();
    }

    /**
     * {@inheritdoc}
     */
    protected function afterParseData(&$data)
    {
        /** @var ClientSetter $data */
        $data = $data->getClient();
    }
}
