<?php

namespace Classes;

class Sessions {
   public function __construct()
   {
      if(\session_status()){
         return \session_start();
      }
   }

   public function hasSession($key){
      return isset($_SESSION[$key]) ? $_SESSION[$key] : null;
   }
   
   public function Set($key,$value){
      return $_SESSION[$key] = $value;
   }

   public function Get($key){
      return isset($_SESSION[$key])? $_SESSION[$key] : false;
   }
   
   public function Clear($key){
      unset($_SESSION[$key]);
   }

   public function destroy(){
      session_destroy();
   }
}