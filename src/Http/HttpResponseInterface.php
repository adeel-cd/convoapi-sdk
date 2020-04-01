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
     * Provide Http Body Response
     *
     * @param string|null $format           data return format
     * @param bool        $message_decoding decode or not
     *
     * @return array|mixed|string|null
     */
    public function getResponse(string $format = null, bool $message_decoding = false);
}