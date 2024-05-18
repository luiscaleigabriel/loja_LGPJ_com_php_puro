<?php

namespace app\support;

use app\traits\Validations;
use Exception;

class Validate 
{
    use Validations;

    public function validate(array $fields) 
    {
        $inputValidation = [];

        foreach($fields as $index => $field) {

            $havePipes = \str_contains($field, '|');

            if(!$havePipes) {
                $param = '';
                $method = $field;

                if(substr_count($field, ':') === 1) {
                    list($method, $param) = explode(':', $field);

                    if(!method_exists($this, $method)) {
                        throw new Exception("A válidação {$method} não existe");
                    }
                    $inputValidation[$index] = $this->$method($index,$param);
                }

                $inputValidation[$index] = $this->$method($index);
            }else {
                $validations = explode('|', $field);
                $param = '';
                foreach($validations as $validation) {
                    if(substr_count($validation, ':') === 1) {
                        list($validation, $param) = explode(':', $validation);
                        if(!method_exists($this, $validation)) {
                            throw new Exception("A válidação {$validation} não existe");
                        }
                        $inputValidation[$index] = $this->$validation($index, $param);
                    }

                    $inputValidation[$index] = $this->$validation($index);
                    var_dump($inputValidation);
                    if(empty($inputValidation[$index])) {
                        break;
                    }
                }

            }
        }
    }
}