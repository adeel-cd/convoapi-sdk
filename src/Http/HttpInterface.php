<?php

namespace Poc\Http;

/**
 * Interface HttpInterface
 * @package Poc\Http
 */
interface HttpInterface
{
    const GET    = 'get';
    const POST   = 'post';
    const PUT    = 'put';
    const PATCH  = 'patch';
    const DELETE = 'delete';

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