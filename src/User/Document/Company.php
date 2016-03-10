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

namespace Lsv\Timeharvest\User\Document;

/**
 * UserCompany
 * @package Lsv\Timeharvest\User\Document
 */
class Company
{

    /**
     * base uri
     * @var string
     */
    protected $baseUri;

    /**
     * domain
     * @var string
     */
    protected $fullDomain;

    /**
     * company name
     * @var string
     */
    protected $name;

    /**
     * company active
     * @var bool
     */
    protected $active;

    /**
     * which day is start of week
     * @var string
     */
    protected $weekStartDay;

    /**
     * time format
     * @var string
     */
    protected $timeFormat;

    /**
     * clock format
     * @var string
     */
    protected $clock;

    /**
     * decimal symbol
     * @var string
     */
    protected $decimalSymbol;

    /**
     * color scheme
     * @var string
     */
    protected $colorScheme;

    /**
     * modules
     * @var array
     */
    protected $modules;

    /**
     * 1000 separator
     * @var string
     */
    protected $thousandsSeparator;

    /**
     * company plan type
     * @var string
     */
    protected $planType;

    /**
     * @return string
     */
    public function getBaseUri()
    {
        return $this->baseUri;
    }

    /**
     * @param string $baseUri
     * @return Company
     */
    public function setBaseUri($baseUri)
    {
        $this->baseUri = $baseUri;
        return $this;
    }

    /**
     * @return string
     */
    public function getFullDomain()
    {
        return $this->fullDomain;
    }

    /**
     * @param string $fullDomain
     * @return Company
     */
    public function setFullDomain($fullDomain)
    {
        $this->fullDomain = $fullDomain;
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
     * @return Company
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
     * @return Company
     */
    public function setActive($active)
    {
        $this->active = $active;
        return $this;
    }

    /**
     * @return string
     */
    public function getWeekStartDay()
    {
        return $this->weekStartDay;
    }

    /**
     * @param string $weekStartDay
     * @return Company
     */
    public function setWeekStartDay($weekStartDay)
    {
        $this->weekStartDay = $weekStartDay;
        return $this;
    }

    /**
     * @return string
     */
    public function getTimeFormat()
    {
        return $this->timeFormat;
    }

    /**
     * @param string $timeFormat
     * @return Company
     */
    public function setTimeFormat($timeFormat)
    {
        $this->timeFormat = $timeFormat;
        return $this;
    }

    /**
     * @return string
     */
    public function getClock()
    {
        return $this->clock;
    }

    /**
     * @param string $clock
     * @return Company
     */
    public function setClock($clock)
    {
        $this->clock = $clock;
        return $this;
    }

    /**
     * @return string
     */
    public function getDecimalSymbol()
    {
        return $this->decimalSymbol;
    }

    /**
     * @param string $decimalSymbol
     * @return Company
     */
    public function setDecimalSymbol($decimalSymbol)
    {
        $this->decimalSymbol = $decimalSymbol;
        return $this;
    }

    /**
     * @return string
     */
    public function getColorScheme()
    {
        return $this->colorScheme;
    }

    /**
     * @param string $colorScheme
     * @return Company
     */
    public function setColorScheme($colorScheme)
    {
        $this->colorScheme = $colorScheme;
        return $this;
    }

    /**
     * @return array
     */
    public function getModules()
    {
        return $this->modules;
    }

    /**
     * @param array $modules
     * @return Company
     */
    public function setModules($modules)
    {
        $this->modules = $modules;
        return $this;
    }

    /**
     * @return string
     */
    public function getThousandsSeparator()
    {
        return $this->thousandsSeparator;
    }

    /**
     * @param string $thousandsSeparator
     * @return Company
     */
    public function setThousandsSeparator($thousandsSeparator)
    {
        $this->thousandsSeparator = $thousandsSeparator;
        return $this;
    }

    /**
     * @return string
     */
    public function getPlanType()
    {
        return $this->planType;
    }

    /**
     * @param string $planType
     * @return Company
     */
    public function setPlanType($planType)
    {
        $this->planType = $planType;
        return $this;
    }
}
