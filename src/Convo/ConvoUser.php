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
     * @param array $request
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public function createUser(array $request)
    {
        return $this->guzzle_http->post(self::URI().__FUNCTION__, $request);
    }
}