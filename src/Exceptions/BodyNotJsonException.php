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

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * Exception for if a response is not a valid json object
 * @package Lsv\Timeharvest\Exceptions
 */
class BodyNotJsonException extends Exception
{

    /**
     * The response
     * @var ResponseInterface
     */
    private $response;

    /**
     * The request
     * @var RequestInterface
     */
    private $request;

    public function __construct(ResponseInterface $response, RequestInterface $request)
    {
        $this->message = 'Response body is not in a JSON format';
        $this->response = $response;
        $this->request = $request;
    }

    /**
     * @return ResponseInterface
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * @return RequestInterface
     */
    public function getRequest()
    {
        return $this->request;
    }
}
