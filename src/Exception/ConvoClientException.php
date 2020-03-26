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
     * // set by response
     * @return string
     */
    public function throwException()
    {
        $exception = [
            'status' => $this->_errorCode(),
            'data'   => $this->_errorMessage()
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