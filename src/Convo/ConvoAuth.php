<?php

namespace Poc\Convo;

/**
 * Class ConvoAuth
 * @package Poc\Convo
 */
class ConvoAuth extends ConvoResource
{

    /**
     * ConvoAuth constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param array $request
     * @return bool|mixed|\Psr\Http\Message\StreamInterface
     */
    public function authenticateUser(array $request)
    {
        $this->validate($request, [
            'email'    => 'required|email',
            'password' => 'required|min:8'
        ]);

        return $this->guzzle_http->post(self::URI().__FUNCTION__, $request);
    }
}