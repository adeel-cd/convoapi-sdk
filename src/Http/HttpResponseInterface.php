<?php

namespace Poc\Http;

/**
 * Response Interface Class Map.
 * Interface HttpResponseInterface
 *
 * @category ResponseInterface
 * @package  Poc\Http
 * @author   Yousuf Khalid <yousuf.khalid@codedistrict.com>
 * @license  https://github.com/adeel-cd/convoapi-sdk/blob/master/LICENSE.md MIT
 * @link     https://packagist.org/packages/convo/alert
 */
interface HttpResponseInterface
{

    /**
     * Provide Response Type
     *
     * @param string|null $format must be string
     *
     * @return mixed
     */
    public function getResponse(string $format = null);
}