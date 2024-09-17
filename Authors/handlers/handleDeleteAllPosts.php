<?php

require_once "../App.php";

$id = $req->GET("id");
$rows = $db->Get_Rows_Where("posts","user_id=?",[$id]);

foreach($rows as $row){
  $image = $row['image'];
  $id = $row['id'];
  $UploadImage->RemoveImage("../assets/upload/",$image);
  $db->DeleteRow("posts",$id);
}
$req->Redirect("../index.php?id=$id");