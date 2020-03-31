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
     * @param array $payload must be array
     *
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public function createUser(array $payload)
    {
        return $this->http_client->post(self::URI().__FUNCTION__,  $payload);
    }
}