<?php

namespace Poc\Convo;

use Poc\Http\HttpClient;

/**
 * Class ConvoResource
 * @package Poc\Convo
 */
abstract class ConvoResource
{

    /**
     * @var HttpClient
     */
    protected $guzzle_http;

    /**
     * @var mixed
     */
    protected static $api_config;

    /**
     * ConvoResource constructor.
     */
    protected function __construct()
    {
        $this->guzzle_http = new HttpClient();
        self::$api_config = include __ROOT__."/config.php";
    }

    /**
     * @return mixed|null
     */
    protected static function PATH()
    {
        return self::$api_config['url'] ?? null;
    }

    /**
     * @return mixed|null
     */
    protected static function VERSION()
    {
        return self::$api_config['version'] ?? null;
    }

    /**
     * @return string
     */
    protected static function URI()
    {
        return sprintf("%s/%s/", self::PATH(), self::VERSION());
    }
}