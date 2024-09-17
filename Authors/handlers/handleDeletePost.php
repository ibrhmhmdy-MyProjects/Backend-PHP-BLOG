<?php

require_once "../App.php";
require_once "../classes/UploadFiles.php";
use classes\UploadFiles;

  $img = new UploadFiles();
  $id = $req->GET('id');
  $post_image = $db->Get_Col_ID("image","posts",$id);
  $img->RemoveImage("../assets/upload/",$post_image);
  $db->DeleteRow("posts",$id);
  $req->Redirect("../index.php");