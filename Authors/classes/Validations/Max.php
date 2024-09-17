<?php

namespace classes\Validations;
require_once "IValidations.php";

use classes\Validations\IValidations;

class Max implements IValidations {

  public function Validate($field, $value)
  {
    if(strlen($value) > 12){
      return "$field must not be more than 12 chars";
    }
    return false;
  }
}