<?php

namespace classes\Validations;
require_once "IValidations.php";

use classes\Validations\IValidations;

class Email implements IValidations {
  public function Validate($field, $value)
  {
    if(!\filter_var($value,\FILTER_VALIDATE_EMAIL)){
      return "Email not Valid";
    }
    return false;
  }
}