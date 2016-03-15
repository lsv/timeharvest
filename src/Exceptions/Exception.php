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
 * General exception
 * @package Lsv\Timeharvest\Exceptions
 */
class Exception extends \Exception
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

    /**
     * @var null|string
     */
    private $reason;

    /**
     * Exception constructor.
     * @param RequestInterface $request
     * @param ResponseInterface|null $response
     * @param string $reason
     */
    public function __construct(RequestInterface $request, ResponseInterface $response = null, $reason = null)
    {
        $this->response = $response;
        $this->request = $request;
        $this->reason = $reason;
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

    /**
     * @return null|string
     */
    public function getReason()
    {
        return $this->reason;
    }
}
