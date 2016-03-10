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
class Client
{

    /**
     * Client details
     * @var ClientDetails
     */
    protected $client;

    /**
     * get client details
     * @return ClientDetails
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * Set client details
     * @param ClientDetails $client
     * @return Client
     */
    public function setClient($client)
    {
        $this->client = $client;
        return $this;
    }
}
