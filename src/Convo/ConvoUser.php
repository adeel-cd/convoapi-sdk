<?php

namespace Poc\Convo;

/**
 * Class ConvoUser
 * @package Poc\Convo
 */
class ConvoUser extends ConvoResource
{

    /**
     * ConvoUser constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Create New User
     *
     * @param array $payload
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public function createUser(array $payload)
    {
        return $this->http_client->post(self::URI().__FUNCTION__,  $payload);
    }
}