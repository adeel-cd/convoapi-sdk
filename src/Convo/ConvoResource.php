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
        self::$api_config = include __ROOT__."/config.php";
    }

    /**
     * Provide Api Path
     *
     * @return string|null
     */
    protected static function PATH()
    {
        return self::$api_config['url'] ?? null;
    }

    /**
     * Provide Api Version
     *
     * @return string|null
     */
    protected static function VERSION()
    {
        return self::$api_config['version'] ?? null;
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

    /**
     * Provide Authentication Token
     *
     * @return string|null
     */
    protected static function TOKEN()
    {
        return self::$api_config['_token'] ?? null;
    }

    /**
     * Append Authentication Token With Current Request
     *
     * @param array $payload
     * @return array
     */
    protected static function APPEND_TOKEN(array $payload)
    {
        if(self::TOKEN() !== null && !array_key_exists('_token', $payload))
        {
            $payload = array_merge(['_token' => self::TOKEN()], $payload);
        }

        return $payload;
    }
}