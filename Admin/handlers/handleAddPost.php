<?php

require_once "../App.php";
require_once "../classes/UploadFiles.php";
use classes\UploadFiles;

if($req->hasRequest($req->POST("submit"))){
  if($Session->hasSession("current_login")){
    $current_user = $Session->Get("current_login");
    $author_id = $current_user['id'];
  }else{
    $req->Redirect("../../Login.php");
  }
  $title = $req->POST("title");
  $body = $req->POST("body");
  $imgFile = $req->FILES("img");
  $valid->rules("title",$title,['required','string','min:4']);
  $valid->rules("body",$body,['required','string','min:4']);
  $valid->rules("img",$imgFile['name'],['required','img']);
  
  if(!$valid->errors){
    $img = new UploadFiles($imgFile);
    $new_img = $img->UploadImage("../assets/upload/");

    $arr_columns = ["title","body","image","user_id"];
    $arr_values = [$title,$body,$new_img,$author_id];
    $db->AddRow("posts",$arr_columns,$arr_values);
    $req->Redirect("../index.php");
    
  }else{
    $Session->Set("errors",$valid->errors);
    $req->Redirect("../addPost.php");
  }
}
