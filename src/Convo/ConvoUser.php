<?php

namespace Poc\Convo;

/**
 * This Class Provides Access on Convo User Module API.
 * Class ConvoUser
 *
 * @category User
 * @package  Poc\Convo
 * @author   Yousuf Khalid <yousuf.khalid@codedistrict.com>
 * @license  https://github.com/adeel-cd/convoapi-sdk/blob/master/LICENSE.md MIT
 * @link     https://packagist.org/packages/convo/alert
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
     * @param array $request must be array
     *
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public function createUser(array $request)
    {

        // Apply Validations
        $validate = $this->validation->validate($request, [
            '_token'      => 'required',
            'username'    => 'required|email',
            'firstname'   => 'required',
            'lastname'    => 'required',
            'picture'     => 'required|file',
            'roles'       => 'required|array',
            'designation' => 'required',
        ]);

        // Check for failed rules
        if ($this->validation->fails())
        {
            return $validate;
        }

        // Convert Image to encodedBase64
        if($encoded = $this->_encodeBase64($request['picture']))
        {
            $request['picturebase64'] = $encoded;
        }

        return $this->http_client->post(self::URI().__FUNCTION__,  $request);
    }

    /**
     * Convert Image to Base64
     *
     * @param $file, to be converted
     *
     * @return bool|string
     */
    private function _encodeBase64($file)
    {
        if($contents = file_get_contents($file))
        {
            return base64_encode($contents);
        }

        return false;
    }
}