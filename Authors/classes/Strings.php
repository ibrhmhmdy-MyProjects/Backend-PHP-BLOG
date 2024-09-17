<?php
namespace classes;

class Strings{
  public function Excerpt($text,$numChar){
    if(strlen($text) > $numChar){
      return substr($text, 0,$numChar) . " .....";
    }
    return $text;
  }
}