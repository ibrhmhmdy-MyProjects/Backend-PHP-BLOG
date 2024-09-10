<?php

namespace classes\Validations;
require_once "IValidations.php";

use classes\Validations\IValidations;

class Images implements IValidations {
  public function Validate($field, $value)
  {
    $ext = ["jpg","jpeg","png","gif"];
    $img_ext = \pathinfo($value,\PATHINFO_EXTENSION);
    if(!\in_array($img_ext,$ext)){
      return "$field not Valid Extensions";
    }
    return \false;
  }
}