<?php

namespace Poc\Http;

/**
 * Http ClientInterface Class Map
 * Interface HttpClientInterface
 *
 * @category ClientInterface
 * @package  Poc\Http
 * @author   Yousuf Khalid <yousuf.khalid@codedistrict.com>
 * @license  https://github.com/adeel-cd/convoapi-sdk/blob/master/LICENSE.md MIT
 * @link     https://packagist.org/packages/convo/alert
 */
interface HttpClientInterface
{

    /**
     * Attempt HTTP GET Request
     *
     * @param string $url     must be string
     * @param array  $payload must be array
     *
     * @return bool|mixed|string
     */
    public function get(string $url, array $payload);

    /**
     * Attempt HTTP POST Request
     *
     * @param string $url     must be string
     * @param array  $payload must be array
     *
     * @return bool|mixed|string
     */
    public function post(string $url, array $payload);


    /**
     * Attempt HTTP PUT Request
     *
     * @param string $url     must be string
     * @param array  $payload must be array
     *
     * @return bool|mixed|string
     */
    public function put(string $url, array $payload);

    /**
     * Attempt HTTP PATCH Request
     *
     * @param string $url     must be string
     * @param array  $payload must be array
     *
     * @return bool|mixed|string
     */
    public function patch(string $url, array $payload);

    /**
     * Attempt HTTP DELETE Request
     *
     * @param string $url     must be string
     * @param array  $payload must be array
     *
     * @return bool|mixed|string
     */
    public function delete(string $url, array $payload);
}