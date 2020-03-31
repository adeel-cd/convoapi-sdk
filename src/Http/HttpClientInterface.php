<?php

namespace Poc\Http;

/**
 * Http ClientInterface Class Map
 * Interface HttpInterface
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
     * Provide Get Request
     *
     * @param string $url     must be url
     * @param array  $options body params
     *
     * @return mixed
     */
    public function get(string $url, array $options);

    /**
     * Provide Post Request
     *
     * @param string $url     must be url
     * @param array  $options body params
     *
     * @return mixed
     */
    public function post(string $url, array $options);


    /**
     * Provide Put Request
     *
     * @param string $url     must be url
     * @param array  $options body params
     *
     * @return mixed
     */
    public function put(string $url, array $options);

    /**
     * Provide Patch Request
     *
     * @param string $url     must be url
     * @param array  $options body params
     *
     * @return mixed
     */
    public function patch(string $url, array $options);

    /**
     * Provide Delete Request
     *
     * @param string $url     must be url
     * @param array  $options body params
     *
     * @return mixed
     */
    public function delete(string $url, array $options);
}