<?php

namespace Poc\Validation;

use Poc\Exception\ConvoValidationException;

/**
 * Class ConvoValidation
 * @package Poc\Validation
 */
class ConvoValidation implements ConvoValidationInterface
{

    public static $regexes = [
        'date' => "^[0-9]{4}[-/][0-9]{1,2}[-/][0-9]{1,2}\$",
        'amount' => "^[-]?[0-9]+\$",
        'number' => "^[-]?[0-9,]+\$",
        'alfanum' => "^[0-9a-zA-Z ,.-_\\s\?\!]+\$",
        'not_empty' => "[a-z0-9A-Z]+",
        'words' => "^[A-Za-z]+[A-Za-z \\s]*\$",
        'phone' => "^[0-9]{10,11}\$",
        'zipcode' => "^[1-9][0-9]{3}[a-zA-Z]{2}\$",
        'plate' => "^([0-9a-zA-Z]{2}[-]){2}[0-9a-zA-Z]{2}\$",
        'price' => "^[0-9.,]*(([.,][-])|([.,][0-9]{2}))?\$",
        '2digitopt' => "^\d+(\,\d{2})?\$",
        '2digitforce' => "^\d+\,\d\d\$",
        'anything' => "^[\d\D]{1,}\$"
    ];

    public function validate(array $request, array $rules)
    {

        $request = [
            'username' => 'asd',
            'password' => 'pas',
        ];

        $rules = [
            'username' => 'required|email',
            'password' => 'required'
        ];

        if(count($request) > 0)
        {
            foreach ($rules as $key => $rule)
            {
                if($this->_requestHasParam($key, $request))
                {
                    foreach ($this->_rulesBag($rule) as $method)
                    {
                        if(method_exists($this, $method))
                        {
                            $response = $this->{$method}($key, $request[$key]);
                            if($response === true)
                            {
                                throw new ConvoValidationException($response);
                            }
                        }
                    }
                }
            }
        }

        return false;
    }
//
//    /**
//     * Check Whether request has
//     * all params define in rules
//     *
//     * @param string $key
//     * @param array $request
//     * @return bool
//     */
//    private function _requestHasParam(string $key, array $request)
//    {
//        return array_key_exists($key, $request);
//    }
//
//    /**
//     * Split Multiple Rules
//     *
//     * @param string $rule
//     * @return array
//     */
//    private function _rulesBag(string $rule)
//    {
//        return explode('|', $rule);
//    }
//
//    /**
//     * Email Validation Rule
//     *
//     * @param string $key
//     * @param string $value
//     * @return string
//     */
//    private function email(string $key, string $value)
//    {
//        return filter_var($value, FILTER_VALIDATE_EMAIL) ?: $this->_errorBag($key, self::EMAIL);
//    }
//
//    /**
//     * Required Field Validation Rule
//     *
//     * @param string $key
//     * @param string $value
//     * @return string
//     */
//    private function required(string $key, string $value)
//    {
//        return !empty($value) ?: $this->_errorBag($key);
//    }
//
//    /**
//     * Generate Error Message
//     *
//     * @param string $type
//     * @param string $key
//     * @return string
//     */
//    private function _errorBag(string $key, string $type = null)
//    {
//        $message = null;
//
//        switch ($type)
//        {
//            case self::REQUIRED:
//                $message = sprintf("The %s is required.", $key);
//                break;
//            case self::EMAIL:
//                $message = sprintf("Invalid Email.");
//                break;
//            default:
//                $message = sprintf("The %s is required.", $key);
//                break;
//        }
//
//        return $message;
//    }
}