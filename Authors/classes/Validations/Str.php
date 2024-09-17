<?php

namespace classes\Validations;
require_once "IValidations.php";

use classes\Validations\IValidations;

class Str implements IValidations {
  public function Validate($field, $value)
  {
    if(!empty($value) && \is_numeric($value)){
      return "$field must be Contains String";
    }
    return false;
  }
}