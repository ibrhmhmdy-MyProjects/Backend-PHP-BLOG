<?php

namespace classes\Validations;
require_once "IValidations.php";

use classes\Validations\IValidations;

class Min implements IValidations {

  public function Validate($field, $value)
  {
    if(\strlen($value) < 4){
      return "$field must not be less than 4 chars";
    }
    return false;
  }
}