<?php

namespace Poc\Validation;

/**
 * This class provides basic rules for validations
 * Class ConvoValidationRules
 *
 * @category ValidationRules
 * @package  Poc\Validation
 * @author   Yousuf Khalid <yousuf.khalid@codedistrict.com>
 * @license  https://github.com/adeel-cd/convoapi-sdk/blob/master/LICENSE.md MIT
 * @link     https://packagist.org/packages/convo/alert
 */
class ConvoValidationRules implements ConvoValidationRulesInterface
{

    /**
     * Hold Error Messages
     *
     * @var array
     */
    public $errors = [];

    /**
     * Validation For Required Value
     *
     * @param string $key   field name
     * @param array  $value field value
     *
     * @return bool
     */
    public function required(string $key, array $value)
    {
        if(isset($value[$key]) && !empty($value[$key]))
        {
            return true;
        }

        return $this->error(sprintf("%s is required.", $key));
    }

    /**
     * Validation For Email
     *
     * @param string $key   field name
     * @param array  $value field value
     *
     * @return bool
     */
    public function typeEmail(string $key, array $value)
    {
        if(filter_var($value[$key], FILTER_VALIDATE_EMAIL))
        {
            return true;
        }

        return $this->error(sprintf("%s must be an email.", $key));
    }

    /**
     * Validation For Array
     *
     * @param string $key   field name
     * @param array  $value field value
     *
     * @return bool|int
     */
    public function typeArray(string $key, array $value)
    {
        if(is_array($value[$key]))
        {
            return true;
        }

        return $this->error(sprintf("%s must be an array.", $key));
    }

    /**
     * Validation For File
     *
     * @param string $key field name
     *
     * @return bool|int
     */
    public function typeFile(string $key)
    {
        if(isset($_FILES[$key]))
        {
            return true;
        }

        return $this->error(sprintf("%s must be a file", $key));
    }

    /**
     * Validation For Allowed Extensions
     *
     * @param string $key   field name
     * @param array  $value field value
     *
     */
    public function extension(string $key, array $value)
    {
        print_r([$key, $value]);
    }

    /**
     * Push Error Messages
     *
     * @param string $message | error message string
     *
     * @return int
     */
    public function error(string $message)
    {
        return array_push($this->errors, $message);
    }
}