<?php

namespace Poc\Exception;

use Poc\Http\HttpResponse;

/**
 * This class handle Validation base Exception.
 * Class ConvoValidationException
 *
 * @category ValidationException
 * @package  Poc\Exception
 * @author   Yousuf Khalid <yousuf.khalid@codedistrict.com>
 * @license  https://github.com/adeel-cd/convoapi-sdk/blob/master/LICENSE.md MIT
 * @link     https://packagist.org/packages/convo/alert
 */
class ValidationException extends \Exception
{

    /**
     * Exception Instance
     *
     * @var object
     */
    private $_exception;

    /**
     * ValidationException constructor.
     *
     * @param string|null $message Error Message
     * @param int         $code    Error Code
     */
    public function __construct(string $message = null, int $code = 0)
    {
        parent::__construct($message, $code);
        $this->_exception = $exception ?? $this;
    }

    /**
     * Provide Exception Body Response
     *
     * @return mixed|string|null
     */
    public function getResponse()
    {
        return (new HttpResponse($this->_exception))->getResponse('json', true);
    }
}