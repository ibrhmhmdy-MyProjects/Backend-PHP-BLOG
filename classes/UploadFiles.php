<?php
namespace classes;

class UploadFiles{
  private $arr_img;

  public function __construct($selectImage = null)
  {
      $this->arr_img = $selectImage;     
      return $this->arr_img; 
  }
  
  public function UploadImage($pathImage){
    $img_ext = pathinfo($this->arr_img['name'],PATHINFO_EXTENSION);
    $now_date = date("Ymd");
    $new_img = $now_date . uniqid()."." . $img_ext;
    move_uploaded_file($this->arr_img['tmp_name'],$pathImage .$new_img);
    return $new_img;
  }
  
  public function RemoveImage($pathImage,$oldImage){
    if(file_exists($pathImage . $oldImage)){
      unlink($pathImage . $oldImage);
    }
  }
}
