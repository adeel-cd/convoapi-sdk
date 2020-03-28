<?php

namespace Poc\Convo;

/**
 * Class ConvoRole
 * @package Poc\Convo
 */
class ConvoRole extends ConvoResource
{

    /**
     * ConvoRole constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Provide All Roles Regarding to User
     *
     * @param array $payload
     * @return bool|mixed|string
     */
    public function listAllRoles(array $payload = null)
    {
        return $this->http_client->post(self::URI().__FUNCTION__,  $payload);
    }
}