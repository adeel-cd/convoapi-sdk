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
     * Activate Channel
     *
     * @param array $request provided data
     *
     * @return bool|mixed|string
     */
    public function activateChannel(array $request)
    {

        // Apply Validation
        $validate = $this->validation->validate($request, [
            '_token' => 'required',
            'path'   => 'required'
        ]);

        // Check for failed rules
        if($this->validation->fails())
        {
            return $validate;
        }

        return $this->http_client->post(self::URI().__FUNCTION__, $request);
    }
}