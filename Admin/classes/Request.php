<?php

namespace Classes;

class Request {

   public function hasRequest($req){
      return isset($req)? true : false;
   }

   public function GET($key){
      return isset($_GET[$key]) ? $_GET[$key] : false;
   }
   
   public function POST($key){
      return isset($_POST[$key]) ? $_POST[$key] : false;
   }

   public function FILES($file){
      return isset($_FILES[$file]) ? $_FILES[$file] : false;
   }
   
   public function Redirect($url){
      return header("location:$url");
   }
}