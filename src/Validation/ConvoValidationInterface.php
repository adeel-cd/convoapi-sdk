<?php

namespace Poc\Validation;

/**
 * Interface ConvoValidationInterface
 * @package Poc\Validation
 */
interface ConvoValidationInterface
{

    const EMAIL    = 'email';
    const BOOL     = 'bool';
    const STRING   = 'string';
    const INTEGER  = 'integer';
    const BOOLEAN  = 'boolean';
    const REQUIRED = 'required';

    /**
     * Validate Current Request with Provided
     * Rules.
     *
     * @param array $request
     * @param array $rules
     * @return mixed
     */
    public function validate(array $request, array $rules);
}