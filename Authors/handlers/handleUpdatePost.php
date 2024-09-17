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
  $id = $req->GET("id");
  $title = $req->POST("title");
  $body = $req->POST("body");
  $imgFile = $req->FILES("img");

  $valid->rules("title",$title,['required','string','min:4']);
  $valid->rules("body",$body,['required','string','min:4']);
  
  if($valid->errors){
    $Session->Set("errors",$valid->errors);
    $req->Redirect("../editPost.php?id=$id");
  }else{
    $arr_columns = ['title','body','user_id'];
    $arr_values = [$title,$body,$author_id];

    if(!empty($imgFile['name'])){
      $img = new UploadFiles($imgFile);
      $new_img = $img->UploadImage("../assets/upload/");
      $old_image = $db->Get_Col_ID("image","posts",$id);
      $img->RemoveImage("./assets/upload/", $old_image);
      $arr_columns[] = 'image';
      $arr_values[] = $new_img;
    }
    $db->UpdateRow("posts", $arr_columns,$arr_values,$id);
    $req->Redirect("../index.php");
  }
}
