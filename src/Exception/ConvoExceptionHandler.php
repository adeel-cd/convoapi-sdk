<?php

namespace Poc\Exception;

use GuzzleHttp\Exception\ClientException;

/**
 * Class ConvoExceptionHandler
 * @package Poc\Exception
 */
class ConvoExceptionHandler extends \Exception
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
     * @return string
     */
    public function throwException()
    {
        $exception = [
            'code'    => $this->_errorCode(),
            'message' => $this->_errorMessage()
        ];

        return \GuzzleHttp\json_encode($exception);
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