<?php

namespace Poc\Validation;

/**
 * Class ConvoValidation
 * @package Poc\Validation
 */
class ConvoValidation implements ConvoValidationInterface
{


    public function validate(array $request, array $rules)
    {

        $request = [
            'username' => 'abc',
            'password' => 'pas',
        ];

        $rules = [
            'username' => 'required|email',
            'password' => 'required'
        ];

        if(count($request) > 0)
        {
            foreach ($request as $key => $value)
            {
                foreach ($rules as $name => $rule)
                {
                    if($key == $name)
                    {
                        switch ($rule)
                        {
                            case self::REQUIRED:

                        }
                    }
                }
            }
        }

        return false;
    }

    private function _required($data)
    {
        dd([$data]);
    }

    private function _errorBag()
    {

    }
}