<?php

namespace Poc\Exception;

use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\RequestException;

/**
 * Class ConvoExceptionHandler
 * @package Poc\Exception
 */
class ConvoHttpException extends \Exception
{

    /**
     * @var ClientException|RequestException
     */
    private $exception;

    /**
     * ConvoHttpException constructor.
     * @param $exception
     */
    public function __construct($exception)
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
        $body = [
            'status'  => $this->_errorCode(),
            'message' => $this->_errorMessage()
        ];

        return \GuzzleHttp\json_encode($body);
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