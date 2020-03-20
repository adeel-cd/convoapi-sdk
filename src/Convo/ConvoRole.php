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
     * @param array $request
     * @return mixed
     * @throws \Poc\Exception\ConvoExceptionHandler
     */
    public function listAllRoles(array $request)
    {
        return $this->guzzle_http->post(self::URI().__FUNCTION__, $request);
    }
}