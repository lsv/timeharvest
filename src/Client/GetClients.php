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
use Lsv\Timeharvest\Client\Document\Client;
use Lsv\Timeharvest\Client\Document\ClientDetails;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * List clients
 * @package Lsv\Timeharvest\Client
 */
class GetClients extends AbstractTimeharvest
{

    /**
     * {@inheritdoc}
     * @return ClientDetails[]
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
        return $resolver;
    }

    /**
     * {@inheritdoc}
     */
    protected function getUrl(array $options)
    {
        return 'clients';
    }

    /**
     * {@inheritdoc}
     */
    protected function getDocumentClass()
    {
        return new Client();
    }

    /**
     * {@inheritdoc}
     */
    protected function afterParseData(&$data)
    {
        $output = [];
        /** @var Client $item */
        foreach ($data as $item) {
            $output[] = $item->getClient();
        }
        $data = $output;
    }
}
