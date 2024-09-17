<?php

require_once "../App.php";
if($req->hasRequest($req->POST("submit"))){
  $id = $req->GET("id");
  $username = $req->POST("username");
  $email = $req->POST("email");
  $password = $req->POST("password");

  $valid->rules("username",$username,['required','string','min:4']);
  $valid->rules("email",$email,['required','email']);
  if(!empty($password)){
    $valid->rules("password",$password,['required','min:4','max:12']);
  }

  if(!$valid->errors){
    
    $columns = ["username","email"];
    $values = [$username,$email];
    if(!empty($password)){
      $password = password_hash($password,PASSWORD_DEFAULT);
      $columns[] = "password";
      $values[] = $password;
    }
    $db->UpdateRow("users",$columns,$values,$id);
  }else{
    $Session->Set("errors",$valid->errors);
  }
  $req->Redirect("../index.php?id=$id");
}