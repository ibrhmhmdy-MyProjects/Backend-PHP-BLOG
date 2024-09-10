<?php
require_once "../App.php";

if($req->hasRequest($req->POST("submit"))){
  $login_email = $req->POST("email");
  $login_password = $req->POST("password");
  
  $userLogin = $db->SearchRow("users","email='$login_email'");
  $user_id = $userLogin['id'];
  $user_name = $userLogin['username'];
  $user_email = $userLogin['email'];
  $user_password = $userLogin['password'];
  
  if(!password_verify($login_password,$user_password) || $login_email != $user_email){
    $valid->errors[] = "Email or Password is not Correct";
    $Session->Set("errors",$valid->errors);
  }
  $valid->rules("email",$login_email,['required','email']);
  $valid->rules("password",$login_password,['required']);
  
  if($valid->errors){
    $Session->Set("errors",$valid->errors);
    $req->Redirect("../login.php");
  }else{
    $user_login = ['id' => $user_id,'username' => $user_name, 'email' => $user_email]; 
    $Session->Set("current_login", $user_login);
    $req->Redirect("../index.php");
  }
  
}