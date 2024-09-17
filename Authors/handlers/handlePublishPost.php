<?php

  require_once "../App.php";

  $id = $req->GET("id");

  $arr_columns = ['status'];
  $arr_values = [1];

  $db->UpdateRow("posts", $arr_columns,$arr_values,$id);
  $req->Redirect("../index.php");
 
