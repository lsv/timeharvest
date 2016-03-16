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

use Lsv\Timeharvest\DocumentInterface;

/**
 * Client details
 * @package Lsv\Timeharvest\Client\Document
 */
class Client implements DocumentInterface
{

    /**
     * Client ID
     * @var int
     */
    protected $id;

    /**
     * Client name
     * @var string
     */
    protected $name;

    /**
     * is the client active
     * @var bool
     */
    protected $active;

    /**
     * client currency
     * @var string
     */
    protected $currency;

    /**
     * client highrise
     * @var null|int
     */
    protected $highriseId;

    /**
     * client cache
     * @var int
     */
    protected $cacheVersion;

    /**
     * client last updated
     * @var \DateTime
     */
    protected $updatedAt;

    /**
     * client created
     * @var \DateTime
     */
    protected $createdAt;

    /**
     * client currency symbol
     * @var string
     */
    protected $currencySymbol;

    /**
     * client details
     * @var string
     */
    protected $details;

    /**
     * client invoice time frame
     * @var string
     */
    protected $defaultInvoiceTimeframe;

    /**
     * last invoice type
     * @var string
     */
    protected $lastInvoiceKind;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Client
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Client
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isActive()
    {
        return $this->active;
    }

    /**
     * @param boolean $active
     * @return Client
     */
    public function setActive($active)
    {
        $this->active = $active;
        return $this;
    }

    /**
     * @return string
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @param string $currency
     * @return Client
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getHighriseId()
    {
        return $this->highriseId;
    }

    /**
     * @param int|null $highriseId
     * @return Client
     */
    public function setHighriseId($highriseId)
    {
        $this->highriseId = $highriseId;
        return $this;
    }

    /**
     * @return int
     */
    public function getCacheVersion()
    {
        return $this->cacheVersion;
    }

    /**
     * @param int $cacheVersion
     * @return Client
     */
    public function setCacheVersion($cacheVersion)
    {
        $this->cacheVersion = $cacheVersion;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @param \DateTime $updatedAt
     * @return Client
     */
    public function setUpdatedAt(\DateTime $updatedAt)
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTime $createdAt
     * @return Client
     */
    public function setCreatedAt(\DateTime $createdAt)
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    /**
     * @return string
     */
    public function getCurrencySymbol()
    {
        return $this->currencySymbol;
    }

    /**
     * @param string $currencySymbol
     * @return Client
     */
    public function setCurrencySymbol($currencySymbol)
    {
        $this->currencySymbol = $currencySymbol;
        return $this;
    }

    /**
     * @return string
     */
    public function getDetails()
    {
        return $this->details;
    }

    /**
     * @param string $details
     * @return Client
     */
    public function setDetails($details)
    {
        $this->details = $details;
        return $this;
    }

    /**
     * @return string
     */
    public function getDefaultInvoiceTimeframe()
    {
        return $this->defaultInvoiceTimeframe;
    }

    /**
     * @param string $defaultInvoiceTimeframe
     * @return Client
     */
    public function setDefaultInvoiceTimeframe($defaultInvoiceTimeframe)
    {
        $this->defaultInvoiceTimeframe = $defaultInvoiceTimeframe;
        return $this;
    }

    /**
     * @return string
     */
    public function getLastInvoiceKind()
    {
        return $this->lastInvoiceKind;
    }

    /**
     * @param string $lastInvoiceKind
     * @return Client
     */
    public function setLastInvoiceKind($lastInvoiceKind)
    {
        $this->lastInvoiceKind = $lastInvoiceKind;
        return $this;
    }
}
