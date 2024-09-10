<?php

namespace classes\Validations;
require_once "IValidations.php";

use classes\Validations\IValidations;

class Required implements IValidations {
  
  public function Validate($field, $value)
  {
    if(empty($value)){
      \htmlspecialchars($value);
      return "$field is Required";
    }
    return false;
  }

}