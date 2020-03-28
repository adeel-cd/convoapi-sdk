<?php

namespace Poc\Convo;

/**
 * Class ConvoChannel
 * @package Poc\Convo
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
     * @param array $payload
     * @return bool|mixed|string
     */
    public function activateChannel(array $payload)
    {
        return $this->http_client->post(self::URI().__FUNCTION__, $payload);
    }
}