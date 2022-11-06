<?php

    namespace App\Libraries;

    class Validator
    {
        private $errors;

        private function addError($field, $message)
        {
            $this->errors[$field][] = $message;
        }

        protected function errors()
        {
            if(empty($this->errors)) return false;
            return $this->errors;
        }

        protected function validate($data, $rules)
        {
            foreach($data as $field => $fieldValue)
            {
                if(key_exists($field, $rules))
                {
                    foreach($rules[$field] as $rule => $ruleValue)
                    {
                        switch($rule)
                        {
                            case 'required':
                                
                                if(empty($fieldValue) && $ruleValue)
                                {
                                    $this->addError($field, $field . ' is required');
                                }

                                break;

                            case 'email':

                                if(!filter_var($fieldValue, FILTER_VALIDATE_EMAIL) && $ruleValue)
                                {
                                    $this->addError($field, $field . ' must be a valid email address');
                                }

                                break;

                            case 'min':

                                if(strlen($fieldValue) < $ruleValue)
                                {
                                    $this->addError($field, $field . ' must be at least ' . $ruleValue . ' characters long');
                                }

                                break;

                            case 'max':

                                if(strlen($fieldValue) > $ruleValue)
                                {
                                    $this->addError($field, $field . ' can\'t be longer than ' . $ruleValue . ' characters');
                                }

                                break;
                        }
                    }
                }
            }
        }
    }
