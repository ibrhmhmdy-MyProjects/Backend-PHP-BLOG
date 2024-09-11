<?php

require_once "../App.php";

if($req->hasRequest($req->POST("submit"))){
  $username = $req->POST("username");
  $email = $req->POST("email");
  $password = $req->POST("password");

  $valid->rules("username",$username,['required','string','min:4']);
  $valid->rules("email",$email,['required','email']);
  $valid->rules("password",$password,['required','min:4','max:12']);

  if(!$valid->errors){
    $password = password_hash($password,PASSWORD_DEFAULT);
    $columns = ["username","email","password"];
    $values = [$username,$email,$password];
    $db->AddRow("users",$columns,$values);
    $req->Redirect("../login.php");
  }else{
    $Session->Set("errors",$valid->errors);
    $req->Redirect("../register.php");
  }
}