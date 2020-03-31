<?php

namespace Poc\Exception;

use Poc\Http\HttpResponse;

/**
 * This class handle HttpClient base Exception.
 * Class ConvoHttpException
 *
 * @category HttpException
 * @package  Poc\Exception
 * @author   Yousuf Khalid <yousuf.khalid@codedistrict.com>
 * @license  https://github.com/adeel-cd/convoapi-sdk/blob/master/LICENSE.md MIT
 * @link     https://packagist.org/packages/convo/alert
 */
class ConvoHttpException extends \Exception
{

    /**
     * @var object
     */
    private $_exception;

    /**
     * ConvoHttpException constructor.
     *
     * @param $exception | must have PHPException instance.
     */
    public function __construct($exception)
    {
        parent::__construct();
        $this->_exception = $exception;
    }

    /**
     * @return mixed|string|null
     */
    public function throwException()
    {
        return (new HttpResponse($this->_exception))->getResponse();
    }
}