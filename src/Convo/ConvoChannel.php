<?php

namespace Poc\Convo;

/**
 * This Class Provides Access on Convo Channel Module API.
 * Class ConvoChannel
 *
 * @category Channel
 * @package  Poc\Convo
 * @author   Yousuf Khalid <yousuf.khalid@codedistrict.com>
 * @license  https://github.com/adeel-cd/convoapi-sdk/blob/master/LICENSE.md MIT
 * @link     https://packagist.org/packages/convo/alert
 */
class ConvoChannel extends ConvoResource
{

    /**
     * ConvoChannel constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Activate Channel Regarding Path
     *
     * @param array $payload must be array
     *
     * @return bool|mixed|string
     */
    public function activateChannel(array $payload)
    {
        return $this->http_client->post(self::URI().__FUNCTION__, $payload);
    }
}