<?php

namespace Poc\Validation;

use Poc\Exception\ValidationException;

/**
 * This class provides basic request validations
 * Class ConvoValidation
 *
 * @category Validations
 * @package  Poc\Validation
 * @author   Yousuf Khalid <yousuf.khalid@codedistrict.com>
 * @license  https://github.com/adeel-cd/convoapi-sdk/blob/master/LICENSE.md MIT
 * @link     https://packagist.org/packages/convo/alert
 */
class ConvoValidation implements ConvoValidationInterface
{

    const EXT      = 'ext';
    const FILE     = 'file';
    const EMAIL    = 'email';
    const ARRAY    = 'array';
    const REQUIRED = 'required';

    /**
     * RulesInstance
     *
     * @var ConvoValidationRules
     */
    private $_rules;

    /**
     * ConvoValidation constructor.
     */
    public function __construct()
    {
        $this->_rules = new ConvoValidationRules();
    }

    /**
     * Validate Request
     *
     * @param array $request values
     * @param array $rules   validations
     *
     * @return bool|mixed|string|null
     */
    public function validate(array $request, array $rules)
    {

        // Whether request is null or not
        if(count($request) > 0)
        {
            foreach ($rules as $key => $rule)
            {

                // Check for existing params in request regarding rules
                if($this->_requestHasParam($key, $request))
                {

                    // Process Validation Rules
                    $this->_fetchRules($rule, $key, $request);
                    continue;
                }

                $this->_rules->error(sprintf("%s is missing.", $key));
            }

            return $this->_setResponse();

        }

        $this->_rules->error(sprintf("data array is blank."));

        return $this->_setResponse();
    }

    /**
     * Check Whether Validation fails
     *
     * @return bool
     */
    public function fails()
    {
        return count($this->_rules->errors) > 0;
    }

    /**
     * Set Exception Body Response
     *
     * @return bool|mixed|string|null
     */
    private function _setResponse()
    {
        try
        {
            return $this->_hasErrors();
        }

        catch (ValidationException $exception)
        {
            return $exception->getResponse();
        }
    }

    /**
     * Check Whether request has params
     *
     * @param string $key
     * @param array  $request
     *
     * @return bool
     */
    private function _requestHasParam(string $key, array $request)
    {
        return array_key_exists($key, $request);
    }

    /**
     * Split All Rules
     *
     * @param string $rule all rules
     *
     * @return array
     */
    private function _rulesBag(string $rule)
    {
        return explode('|', $rule);
    }

    /**
     * Process Request with Rules
     *
     * @param string $rule  name
     * @param string $key   value index
     * @param array  $value values
     *
     * @return bool
     */
    private function _fetchRules(string $rule, string $key, array $value)
    {
        foreach ($this->_rulesBag($rule) as $method)
        {
            switch ($method)
            {

            case self::EMAIL:
                $this->_rules->typeEmail($key, $value);
                break;

            case self::REQUIRED:
                $this->_rules->required($key, $value);
                break;

            case self::ARRAY:
                $this->_rules->typeArray($key, $value);
                break;

            case self::FILE:
                $this->_rules->typeFile($key);
                break;

            }
        }

        return false;
    }

    /**
     * Throws Validation Exception if has
     *
     * @return bool
     *
     * @throws ValidationException
     */
    private function _hasErrors()
    {
        if(count($this->_rules->errors) > 0)
        {
            $encoded_message = \GuzzleHttp\json_encode($this->_rules->errors);
            throw new ValidationException($encoded_message, 422);
        }

        return true;
    }
}