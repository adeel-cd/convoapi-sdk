<?php

namespace Poc\Http;

use Poc\Exception\ConvoExceptionHandler;
use GuzzleHttp\Exception\ClientException;
use Psr\Http\Message\ResponseInterface;

/**
 * Class HttpClient
 * @package Poc\Http
 */
class HttpClient extends HttpHeaders
{

    /**
     * HttpClient constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param string $url
     * @param array $request
     * @return bool|mixed|string
     */
    public function get(string $url, array $request)
    {
        return $this->_request(self::GET, $url, $this->setOptions($request));
    }

    /**
     * @param string $url
     * @param array $request
     * @return bool|mixed|string
     */
    public function post(string $url, array $request)
    {
        return $this->_request(self::POST, $url, $this->setOptions($request));


    }

    /**
     * @param string $url
     * @param array $request
     * @return bool|mixed|string
     */
    public function put(string $url, array $request)
    {
        return $this->_request(self::PUT, $url, $this->setOptions($request));
    }

    /**
     * @param string $url
     * @param array $options
     * @return bool|mixed|string
     */
    public function delete(string $url, array $options)
    {
        return $this->_request(self::DELETE, $url, $options);
    }

    /**
     * @param string $url
     * @param array $options
     * @return bool|mixed|string
     */
    public function patch(string $url, array $options)
    {
        return $this->_request(self::PATCH, $url, $options);
    }

    /**
     * @param ResponseInterface $response
     * @return string
     */
    private function _success(ResponseInterface $response)
    {
        if ($response !== false)
        {
            $response = [
                'status' => $response->getStatusCode(),
                'data'   => $response->getBody()
            ];
        }

        return \GuzzleHttp\json_encode($response);
    }

    /**
     * @param string $method
     * @param string $url
     * @param array $request
     * @return bool|string
     */
    private function _request(string $method, string $url, array $request)
    {
        try
        {
            $response = $this->guzzle_client->request($method, $url, $request);
            return $this->_success($response);
        }

        catch (ClientException $exception)
        {
            $exception = new ConvoExceptionHandler($exception);
            echo $exception->throwException();
            die();
        }
    }
}