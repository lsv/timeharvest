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

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Psr7\Request;
use Lsv\Timeharvest\Exceptions\BodyNotJsonException;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Base class for all calls
 *
 * @package Lsv\Timeharvest
 */
abstract class AbstractTimeharvest implements TimeHarvestInterface
{

    const BASEURL = 'https://%s.harvestapp.com';
    const PROTOCOL = '1.1';

    /**
     * Resolved options
     * @var array
     */
    protected $options = [];

    /**
     * The request
     * @var RequestInterface
     */
    protected $request;

    /**
     * Generate the response
     * @return DocumentInterface
     */
    abstract public function getResponse();

    /**
     * Configure options
     * @param OptionsResolver $resolver
     * @return OptionsResolver
     */
    abstract protected function configureOptions(OptionsResolver $resolver);

    /**
     * Get url to the api
     * @param array $options
     * @return string
     */
    abstract protected function getUrl(array $options);

    /**
     * Get the document class to parse
     * @return DocumentInterface
     */
    abstract protected function getDocumentClass();

    /**
     * AbstractTimeharvest constructor.
     * @param Auth $auth
     * @param array|null $options
     */
    public function __construct(Auth $auth, array $options = null)
    {
        $resolver = new OptionsResolver();
        $resolver->setRequired('_method');
        $resolver->setAllowedValues('_method', ['GET', 'POST']);
        $resolver->setDefault('_method', 'GET');

        $resolver->setRequired('httpclient');
        $resolver->setAllowedTypes('httpclient', ClientInterface::class);
        $resolver->setDefault('httpclient', new Client());

        $resolver->setRequired('auth');
        $resolver->setAllowedTypes('auth', Auth::class);
        $resolver->setDefault('auth', $auth);

        // @codeCoverageIgnoreStart
        if ($options === null) {
            $options = [];
        }
        // @codeCoverageIgnoreEnd

        $resolver = $this->configureOptions($resolver);
        $this->options = $resolver->resolve($options);
    }

    /**
     * Get the request, first availiable after getResponse
     * @return RequestInterface
     */
    public function getRequest()
    {
        return $this->request;
    }

    /**
     * Generate the response
     * @return DocumentInterface
     * @throws \Exception
     */
    protected function doResponse()
    {
        $headers = $this->getBasicHeaders();
        // @codeCoverageIgnoreStart
        if (is_array($extra = $this->getRequestHeaders($this->options))) {
            $headers = array_merge($headers, $extra);
        }
        // @codeCoverageIgnoreEnd

        $request = new Request(
            $this->options['_method'],
            $this->parseUrl(),
            $headers,
            $this->getRequestBody($this->options),
            $this->getProtocol()
        );

        $this->request = $request;
        $response = $this->getClient()->send($request);
        return $this->parseData($response);
    }

    /**
     * Parse the URL
     * @return string
     */
    protected function parseUrl()
    {
        return sprintf('%s/%s', $this->getBaseUrl(), $this->getUrl($this->options));
    }

    /**
     * Set the headers to the API call
     * @return array
     */
    protected function getBasicHeaders()
    {
        /** @var Auth $auth */
        $auth = $this->options['auth'];
        $authkey = sprintf('%s:%s', $auth->getUsername(), $auth->getPassword());
        return [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Authorization' => sprintf('Basic %s', base64_encode($authkey)),
        ];
    }

    /**
     * Generate the base url
     * @return string
     */
    protected function getBaseUrl()
    {
        /** @var Auth $auth */
        $auth = $this->options['auth'];
        return sprintf('https://%s.harvestapp.com', $auth->getAccount());
    }

    /**
     * Parse the response data
     * @param ResponseInterface $response
     * @return DocumentInterface
     * @throws ClientException
     * @throws \Exception
     */
    protected function parseData(ResponseInterface $response)
    {
        try {
            $json = json_decode($response->getBody());

            $this->beforeParseData($json);

            if (is_object($json)) {
                $mapper = new \JsonMapper();
                $data = $mapper->map($json, $this->getDocumentClass());
                $this->afterParseData($data);
                return $data;
            } elseif (is_array($json)) {
                $mapper = new \JsonMapper();
                $data = $mapper->mapArray($json, [], get_class($this->getDocumentClass()));
                $this->afterParseData($data);
                return $data;
            }

            throw new BodyNotJsonException($response, $this->request);
        // @codeCoverageIgnoreStart
        } catch (ClientException $e) {
            throw $e;
        } catch (\Exception $e) {
            throw $e;
        }
        // @codeCoverageIgnoreEnd
    }

    /**
     * Set the request headers
     * @param array $options
     * @return array
     */
    protected function getRequestHeaders(array $options)
    {
    }

    /**
     * Set the request body
     * @param array $options
     * @return mixed
     */
    protected function getRequestBody(array $options)
    {
    }

    /**
     * Manipulate the data before the parsing
     * @param \stdClass|array $data
     */
    protected function beforeParseData(&$data)
    {
    }

    /**
     * Manipulate the data after the parsing
     * @param array|DocumentInterface|object $data
     */
    protected function afterParseData(&$data)
    {
    }

    /**
     * Get the HTTP client
     * @return ClientInterface
     */
    protected function getClient()
    {
        return $this->options['httpclient'];
    }

    /**
     * Get the HTTP protocol
     * @return string
     */
    protected function getProtocol()
    {
        return self::PROTOCOL;
    }
}