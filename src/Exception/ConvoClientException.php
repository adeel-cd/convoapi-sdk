<?php

namespace Poc\Exception;

use GuzzleHttp\Exception\ClientException;
use Poc\Http\HttpResponse;

/**
 * Class ConvoExceptionHandler
 * @package Poc\Exception
 */
class ConvoClientException extends \Exception
{

    /**
     * @var ClientException
     */
    private $exception;

    /**
     * ConvoExceptionHandler constructor.
     * @param ClientException $exception
     */
    public function __construct(ClientException $exception)
    {
        parent::__construct();
        $this->exception = $exception;
    }

    /**
     * // set by response
     * @return string
     */
    public function throwException()
    {
        print_r('ues');die();
        $res = new HttpResponse($this->exception);
return $res->getResponse();
//        return \GuzzleHttp\json_encode($exception);
    }

    /**
     * @return int|mixed
     */
    private function _errorCode()
    {
        return $this->exception->getCode();
    }

    /**
     * @return string
     */
    private function _errorMessage()
    {
        return $this->exception->getMessage();
    }

}