<?php

namespace Poc\Http;

/**
 * Interface HttpInterface
 * @package Poc\Http
 */
interface HttpClientInterface
{
    const GET    = 'get';
    const PUT    = 'put';
    const POST   = 'post';
    const PATCH  = 'patch';
    const DELETE = 'delete';
    const AUTHORIZATION = 'Bearer ';
    const CONTENT_TYPE  = 'application/json';

    /**
     * @param string $url
     * @param array $options
     * @return mixed
     */
    public function get(string $url, array $options);

    /**
     * @param string $url
     * @param array $options
     * @return mixed
     */
    public function post(string $url, array $options);


    /**
     * @param string $url
     * @param array $options
     * @return mixed
     */
    public function put(string $url, array $options);

    /**
     * @param string $url
     * @param array $options
     * @return mixed
     */
    public function patch(string $url, array $options);

    /**
     * @param string $url
     * @param array $options
     * @return mixed
     */
    public function delete(string $url, array $options);
}