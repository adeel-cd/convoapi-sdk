<?php

namespace Poc\Http;

use GuzzleHttp\Client;
use Poc\Exception\ConvoExceptionHandler;
use GuzzleHttp\Exception\ClientException;

/**
 * Class HttpClient
 * @package Poc\Http
 */
class HttpClient implements HttpClientInterface
{

    /**
     * @var Client
     */
    private $_client;

    /**
     * @var HttpResponse
     */
    private $_response;

    /**
     * HttpClient constructor.
     */
    public function __construct()
    {
        $this->_client = new Client();
        $this->_response = new HttpResponse();
    }

    /**
     * Attempt HTTP Get request
     *
     * @param string $url
     * @param array $payload
     * @return bool|mixed|string
     */
    public function get(string $url, array $payload)
    {
        return $this->_request(self::GET, $url, $payload);
    }

    /**
     * Attempt HTTP POST request
     *
     * @param string $url
     * @param array $payload
     * @return bool|mixed|string
     */
    public function post(string $url, array $payload)
    {
        return $this->_request(self::POST, $url, $payload);


    }

    /**
     * Attempt HTTP PUT request
     *
     * @param string $url
     * @param array $payload
     * @return bool|mixed|string
     */
    public function put(string $url, array $payload)
    {
        return $this->_request(self::PUT, $url, $payload);
    }

    /**
     * Attempt HTTP DELETE request
     *
     * @param string $url
     * @param array $payload
     * @return bool|mixed|string
     */
    public function delete(string $url, array $payload)
    {
        return $this->_request(self::DELETE, $url, $payload);
    }

    /**
     * Attempt HTTP PATCH request
     *
     * @param string $url
     * @param array $payload
     * @return bool|mixed|string
     */
    public function patch(string $url, array $payload)
    {
        return $this->_request(self::PATCH, $url, $payload);
    }

    /**
     * Set Request Params
     *
     * @param array $payload
     * @return array
     */
    private function _setOptions(array $payload): array
    {
        return [
            'headers' => $this->_setHeaders($payload),
            'body'    => $this->_setBody($payload)
        ];
    }

    /**
     * Set Request Headers
     *
     * @param array $payload
     * @return array
     */
    private function _setHeaders(array $payload): array
    {
        return [
            'Connection'    => 'keep-alive',
            'Content-Type'  => self::CONTENT_TYPE,
            'Authorization' => isset($payload['_token']) ? self::AUTHORIZATION . $payload['_token'] : null
        ];
    }

    /**
     * Set Body Regarding Format
     *
     * @param array $data
     * @return string|null
     */
    private function _setBody(array $data)
    {
        return $this->_response->response($data);
    }

    /**
     * Send GuzzleHTTP Request
     *
     * @param string $method
     * @param string $url
     * @param array $options
     * @return bool|string
     */
    private function _request(string $method, string $url, array $options)
    {
        try
        {
            $response = $this->_client->request($method, $url, $this->_setOptions($options));
//            return $this->_setResponse($response); HttpResponse Class
        }

        catch (ClientException $exception)
        {
            $exception = new ConvoExceptionHandler($exception);
            echo $exception->throwException();
            die();
        }
    }
}