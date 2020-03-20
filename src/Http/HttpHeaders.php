<?php

namespace Poc\Http;

use GuzzleHttp\Client;

/**
 * Class HttpHeaders
 * @package Poc\Http
 */
abstract class HttpHeaders implements HttpInterface
{

    const AUTHORIZATION = 'Bearer ';
    const CONTENT_TYPE = 'application/json';

    /**
     * @var Client
     */
    protected $guzzle_client;

    /**
     * HttpHeaders constructor.
     */
    protected function __construct()
    {
        $this->guzzle_client = new Client();
    }

    /**
     * @param array $request
     * @return array
     */
    protected function setOptions(array $request): array
    {
        return [
            'headers' => $this->_setHeaders($request),
            'body'    => $this->_setBody($request)
        ];
    }

    /**
     * @param array $request
     * @return array
     */
    private function _setHeaders(array $request): array
    {
        return [
            'Connection'    => 'keep-alive',
            'Content-Type'  => self::CONTENT_TYPE,
            'Authorization' => isset($request['_token']) ? self::AUTHORIZATION . $request['_token'] : null
        ];
    }

    /**
     * @param array $request
     * @return string
     */
    private function _setBody(array $request): string
    {
        return \GuzzleHttp\json_encode($request);
    }
}