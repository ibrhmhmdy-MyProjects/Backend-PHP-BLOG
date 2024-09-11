<?php

namespace Classes\Databases;
require_once "QueryBuilder.php";
use Classes\Databases\QueryBuilder;

class MYSQL {
  private $host_name;
  private $user_name;
  private $password;
  private $database_name;
  
  public function __construct($host_name,$database_name,$user_name,$password){
    $this->host_name = $host_name;
    $this->user_name = $user_name;
    $this->password = $password;
    $this->database_name = $database_name;
  }
  
  public function Connect(){
    $conn = mysqli_connect($this->host_name,$this->user_name,$this->password,$this->database_name);
    return ($conn) ? $conn : "Connection is Error";
  }

  public function ReadAll($table){
    $read_data = new QueryBuilder();
    $query = $read_data->SelectAll($table);
    $result = mysqli_query($this->Connect(),$query);
    return $result ? mysqli_fetch_all($result,MYSQLI_ASSOC) : false;
  }
  
  public function ReadRow($table, $id){
    $read_data = new QueryBuilder();
    $query = $read_data->SelectRowByID($table, $id);
    $row = mysqli_query($this->Connect(),$query);
    $result = mysqli_fetch_assoc($row);
    return mysqli_num_rows($row) > 0 ? $result : false;
  }

  public function SearchRow($table,$conditions){
    $read_data = new QueryBuilder();
    $query = $read_data->SelectRowByWhere($table, $conditions);
    $rows = mysqli_query($this->Connect(),$query);
    $result = \mysqli_fetch_all($rows, \MYSQLI_ASSOC);
    return mysqli_num_rows($rows) > 0 ? $result : false;
  }

  public function AddRow($table,$columns,$values){
    $query = new QueryBuilder();
    $new_data = $query->InsertData($table,$columns,$values);
    $result = mysqli_query($this->Connect(),$new_data);
    return $result ? true : false;
  }
  
  public function UpdateRow($table,$row_update,$id){
    $query = new QueryBuilder();
    $new_data = $query->UpdateData($table,$row_update,$id);
    $result = mysqli_query($this->Connect(),$new_data);
    return $result ? true : false;
  }

  public function DeleteRow($table,$id){
    $query = new QueryBuilder();
    $delete_row = $query->DeleteData($table,$id);
    $result = mysqli_query($this->Connect(),$delete_row);
    return $result ? true : false;
  }
  public function CountRows($table){
    $query = new QueryBuilder();
    $sql = $query->CountRows($table);
    $query_count = mysqli_query($this->Connect(),$sql);
    $result = mysqli_num_rows($query_count);
    return $result;
  }
  public function CountRowsByID($table,$id){
    $query = new QueryBuilder();
    $sql = $query->CountID($table,$id);
    $query_count = mysqli_query($this->Connect(),$sql);
    $result = mysqli_num_rows($query_count);
    return $result;
  }
  public function CountRowsByWhere($table,$conditions){
    $query = new QueryBuilder();
    $sql = $query->CountWhere($table,$conditions);
    $query_count = mysqli_query($this->Connect(),$sql);
    $result = mysqli_num_rows($query_count);
    return $result;
  }
  public function getImageName($colName,$table,$id){
    $read_data = new QueryBuilder();
    $query = $read_data->SelectColsByID($colName,$table, $id);
    $row = mysqli_query($this->Connect(),$query);
    $result = mysqli_fetch_assoc($row);
    return mysqli_num_rows($row) > 0 ? $result[$colName] : false;
  }
}