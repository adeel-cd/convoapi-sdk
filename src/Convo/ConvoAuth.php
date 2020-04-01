<?php

namespace Poc\Convo;

/**
 * This Class Provides Access on Convo Authentication Module API.
 * Class ConvoAuth
 *
 * @category Auth
 * @package  Poc\Convo
 * @author   Yousuf Khalid <yousuf.khalid@codedistrict.com>
 * @license  https://github.com/adeel-cd/convoapi-sdk/blob/master/LICENSE.md MIT
 * @link     https://packagist.org/packages/convo/alert
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
     * Authenticate User
     *
     * @param array $request provided data
     *
     * @return \Psr\Http\Message\StreamInterface
     */
    public function authenticateUser(array $request)
    {

        // Apply Validations
        $validate = $this->validation->validate($request, [
            'username' => 'required|email',
            'password' => 'required'
        ]);

        // Check for failed rules
        if($this->validation->fails())
        {
            return $validate;
        }

        return $this->http_client->post(self::URI().__FUNCTION__, $request);
    }
}