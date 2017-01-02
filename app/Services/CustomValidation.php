<?php

namespace App\Services;

use Illuminate\Validation\Validator;
use Carbon\Carbon;

class CustomValidation extends Validator
{
    /*
     * Validate the length of a field depending on the value of another field
     * */
    public function validateLengthIf($attribute, $value, $parameters)
    {
        $value_field_parent = $this->getValue($parameters[0]);
        $position_value = -1;
        for ($i = 1; $i < count($parameters); $i++){
            if($value_field_parent == $parameters[$i]){
                $position_value = $i;
                break;
            }
        }
        if($position_value<0){
            return false;
        }
        $position_length = $position_value+1;
        if(strlen(trim($value)) != intval($parameters[$position_length])){
            return false;
        }else{
            return true;
        }
    }

    /*
     * Validate the age from employee
     * */
    public function validateAdult($attribute, $value, $parameters)
    {
        $age = new Carbon($value);
        return ($age->age < 18) ? false : true;
    }

}