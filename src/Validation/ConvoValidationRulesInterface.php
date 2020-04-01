<?php

namespace Poc\Validation;

/**
 * Convo ValidationRulesInterface Class Map
 * Interface ConvoValidationRulesInterface
 *
 * @category ValidationRulesInterface
 * @package  Poc\Validation
 * @author   Yousuf Khalid <yousuf.khalid@codedistrict.com>
 * @license  https://github.com/adeel-cd/convoapi-sdk/blob/master/LICENSE.md MIT
 * @link     https://packagist.org/packages/convo/alert
 */
interface ConvoValidationRulesInterface
{

    /**
     * Validation For Required Value
     *
     * @param string $key   field name
     * @param array  $value field value
     *
     * @return bool
     */
    public function required(string $key, array $value);

    /**
     * Validation For Email
     *
     * @param string $key   field name
     * @param array  $value field value
     *
     * @return bool
     */
    public function typeEmail(string $key, array $value);

    /**
     * Validation For Array
     *
     * @param string $key   field name
     * @param array  $value field value
     *
     * @return bool|int
     */
    public function typeArray(string $key, array $value);

    /**
     * Validation For File
     *
     * @param string $key field name
     *
     * @return bool|int
     */
    public function typeFile(string $key);

    /**
     * Validation For Allowed Extensions
     *
     * @param string $key   field name
     * @param array  $value field value
     */
    public function extension(string $key, array $value);

    /**
     * Push Error Messages
     *
     * @param string $message | error message string
     *
     * @return int
     */
    public function error(string $message);
}