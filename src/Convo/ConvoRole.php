<?php

namespace Poc\Convo;

/**
 * This Class Provides Access on Convo Role Module API.
 * Class ConvoRole
 *
 * @category Role
 * @package  Poc\Convo
 * @author   Yousuf Khalid <yousuf.khalid@codedistrict.com>
 * @license  https://github.com/adeel-cd/convoapi-sdk/blob/master/LICENSE.md MIT
 * @link     https://packagist.org/packages/convo/alert
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
     * @param array $request provided data
     *
     * @return bool|mixed|string
     */
    public function listAllRoles(array $request)
    {

        // Apply Validations
        $validate = $this->validation->validate($request, [
            '_token' => 'required',
        ]);

        // Check for failed rules
        if($this->validation->fails())
        {
            return $validate;
        }

        return $this->http_client->post(self::URI().__FUNCTION__,  $request);
    }
}