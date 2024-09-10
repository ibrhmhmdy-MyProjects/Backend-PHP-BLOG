<?php

namespace classes\Validations;

require_once "Required.php";
require_once "Email.php";
require_once "Str.php";
require_once "Number.php";
require_once "Min.php";
require_once "Max.php";
require_once "Images.php";

class Validator {
    public $errors = [];

    public function CheckValid($field,$value,$obj){
        return $obj->validate($field,$value);
    }

    public function rules($field,$value,$rules){
        foreach($rules as $rule){
            if($rule == "required"){
                $error = $this->CheckValid($field,$value, new Required);
            }
            elseif($rule == "string"){
                $error = $this->CheckValid($field,$value, new Str);
            }
            elseif($rule == "email"){
                $error = $this->CheckValid($field,$value, new Email);
            }
            elseif($rule == "number"){
                $error = $this->CheckValid($field,$value, new Number);
            }
            elseif($rule == "max:12"){
                $error = $this->CheckValid($field,$value, new Max);
            }
            elseif($rule == "min:4"){
                $error = $this->CheckValid($field,$value, new Min);
            }
            elseif($rule == "img"){
                $error = $this->CheckValid($field,$value, new Images);
            }
            else{
                $error = false;
            }
            if($error){
                $this->errors[] = $error;
            }
        }

        return $this->errors;
    }

    

    

    // public function isPassword($field, $value, $minLength = 8, $requireSpecialChars = true) {
    //     if (strlen($value) < $minLength) {
    //         $this->errors[$field] = "Password must be at least $minLength characters long";
    //     }

    //     if ($requireSpecialChars && !preg_match('/[!@#$%^&*(),.?":{}|<>]/', $value)) {
    //         $this->errors[$field] = "Password must contain at least one special character";
    //     }
    // }

    // public function isMatch($field,$value, $pattern) {
    //     if (!preg_match($pattern, $value)) {
    //         $this->errors[$field] = "$field is not in a valid format";
    //     }
    // }

}