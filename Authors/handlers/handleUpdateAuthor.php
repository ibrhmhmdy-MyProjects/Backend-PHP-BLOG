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
    $auhtor = $db->Get_Row_ID("users",$id);
    $user_id = $auhtor['id'];
    $user_name = $auhtor['username'];
    $user_email = $auhtor['email'];
    $user_login = ['id' => $user_id,'username' => $user_name, 'email' => $user_email]; 
    $Session->Set("current_login", $user_login);
    $req->Redirect("../index.php?id=$id");
  }else{
    $Session->Set("errors",$valid->errors);
    $req->Redirect("../EditAuthor.php?id=$id");
  }
}