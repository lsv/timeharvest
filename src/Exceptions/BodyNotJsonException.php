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

namespace Lsv\Timeharvest\Exceptions;

/**
 * Exception for if a response is not a valid json object
 * @package Lsv\Timeharvest\Exceptions
 */
class BodyNotJsonException extends Exception
{

    protected $message = 'Response body is not in a JSON format';
}
