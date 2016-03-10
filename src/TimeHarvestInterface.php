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

namespace Lsv\Timeharvest;

/**
 * TimeHarvest Interface
 * @package Lsv\Timeharvest
 */
interface TimeHarvestInterface
{

    /**
     * Get response
     * @return DocumentInterface
     */
    public function getResponse();
}
