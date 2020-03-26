<?php

namespace Poc\Http;

use Psr\Http\Message\ResponseInterface;

/**
 * Interface HttpResponseInterface
 * @package Poc\Http
 */
interface HttpResponseInterface
{
    const XML  = 'xml';
    const JSON = 'json';

    /**
     * Get Response Type
     *
     * @param string|null $format
     * @return mixed
     */
    public function getResponse(string $format = null);
}