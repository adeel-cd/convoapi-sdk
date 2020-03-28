<?php

namespace Poc\Convo;

use Poc\Http\HttpClient;
use Poc\Validation\ConvoValidation;

/**
 * Class ConvoResource
 * @package Poc\Convo
 */
abstract class ConvoResource extends ConvoValidation
{

    const URI = 'https://codedistrict.dev.api.convoalert.com/ConvoAnnounce';
    const VERSION = 'v1';

    /**
     * @var HttpClient
     */
    protected $http_client;

    /**
     * @var mixed
     */
    protected static $api_config;

    /**
     * ConvoResource constructor.
     */
    protected function __construct()
    {
        $this->http_client = new HttpClient();
    }

    /**
     * Provide Api Path
     *
     * @return string|null
     */
    protected static function PATH()
    {
        return self::URI;
    }

    /**
     * Provide Api Version
     *
     * @return string|null
     */
    protected static function VERSION()
    {
        return self::VERSION;
    }

    /**
     * Provide URI for API Call
     *
     * @return string
     */
    protected static function URI()
    {
        return sprintf("%s/%s/", self::PATH(), self::VERSION());
    }
}