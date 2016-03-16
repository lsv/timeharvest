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

namespace Lsv\Timeharvest\Client\Document;

/**
 * Client details placeholder
 *
 * @package Lsv\Timeharvest\Client\Document
 */
class ClientSetter
{

    /**
     * Client details
     * @var Client
     */
    protected $client;

    /**
     * get client details
     * @return Client
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * Set client details
     * @param Client $client
     * @return ClientSetter
     */
    public function setClient($client)
    {
        $this->client = $client;
        return $this;
    }
}
