<?php

namespace Poc\Convo;

use Poc\Http\HttpClient;
use Poc\Validation\ConvoValidation;

/**
 * This class provides base settings for API Call.
 * Class ConvoResource
 *
 * @category Resource
 * @package  Poc\Convo
 * @author   Yousuf Khalid <yousuf.khalid@codedistrict.com>
 * @license  https://github.com/adeel-cd/convoapi-sdk/blob/master/LICENSE.md MIT
 * @link     https://packagist.org/packages/convo/alert
 */
abstract class ConvoResource
{

    const VERSION = 'v1';
    const URI     = 'https://codedistrict.dev.api.convoalert.com/ConvoAnnounce';

    /**
     * Set Http Client
     *
     * @var HttpClient
     */
    protected $http_client;

    /**
     * Set Validations
     *
     * @var ConvoValidation
     */
    protected $validation;

    /**
     * Provide basic config
     *
     * @var mixed
     */
    protected static $api_config;

    /**
     * ConvoResource constructor.
     */
    protected function __construct()
    {
        $this->http_client = new HttpClient();
        $this->validation  = new ConvoValidation();
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