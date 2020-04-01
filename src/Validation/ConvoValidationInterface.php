<?php

namespace Poc\Validation;

/**
 * Convo ValidationInterface Class Map
 * Interface ConvoValidationInterface
 *
 * @category ValidationInterface
 * @package  Poc\Validation
 * @author   Yousuf Khalid <yousuf.khalid@codedistrict.com>
 * @license  https://github.com/adeel-cd/convoapi-sdk/blob/master/LICENSE.md MIT
 * @link     https://packagist.org/packages/convo/alert
 */
interface ConvoValidationInterface
{

    /**
     * Validate Request
     *
     * @param array $request values
     * @param array $rules   validations
     *
     * @return bool|mixed|string|null
     */
    public function validate(array $request, array $rules);

    /**
     * Check Whether Validation fails
     *
     * @return bool
     */
    public function fails();
}