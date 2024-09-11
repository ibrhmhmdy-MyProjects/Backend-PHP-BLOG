<?php

namespace Classes\Databases;
require_once "QueryBuilder.php";
use Classes\Databases\QueryBuilder;
use Exception;
use PDO;
use PDOException;

class MYSQL {
  
  private $data_source = "mysql";
  private $host_name;
  private $db_name;
  private $user_name;
  private $password;
  
  public function __construct($host_name,$db_name,$user_name,$password){
    $this->host_name = $host_name;
    $this->db_name = $db_name;
    $this->user_name = $user_name;
    $this->password = $password;
  }
  
  public function Connect(){
    try {
        $Conn = new PDO("$this->data_source:host=$this->host_name;dbname=$this->db_name;charset=utf8", $this->user_name, $this->password);
        $Conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $Conn;
    } catch (PDOException $e) {
        return "Connection is Error : <br>" . $e->getMessage();
    }
  }

  public function Get_All_Table($tableName){
    $table = new QueryBuilder();
    $query = $table->Select_All_Table($tableName);
    $stmt = $this->Connect()->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
  
  public function Get_Row_ID($tableName, $id){
    $table = new QueryBuilder();
    $query = $table->Select_All_Table_ID($tableName);
    $stmt = $this->Connect()->prepare($query);
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }
  public function Get_Col_ID($column,$tableName,$id){
    $query = "SELECT $column FROM $tableName Where id = ?";
    $stmt = $this->Connect()->prepare($query);
    $stmt->execute([$id]);
    return $stmt->fetchColumn();
  }
  // Get One Row Data
  public function Get_Row_Where($tableName,$columns,$arr_values){
    $table = new QueryBuilder();
    $query = $table->Select_All_Table_Where($tableName,$columns);
    $stmt = $this->Connect()->prepare($query);
    $stmt->execute($arr_values);
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }
  // Get Multi Rows Data By Conditions
  public function Get_Rows_Where($tableName,$columns,$arr_values){
    $table = new QueryBuilder();
    $query = $table->Select_All_Table_Where($tableName,$columns);
    $stmt = $this->Connect()->prepare($query);
    $stmt->execute($arr_values);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  // AddRow = TableName, Columns[], Values[]
  public function AddRow($tableName,$columns,$values){
    $table = new QueryBuilder();
    if (count($columns) !== count($values)) {
      throw new Exception('عدد الحقول والقيم غير متساوٍ.');
    }
    $cols_string = implode(", ", $columns);
    $values_string = implode(", ", array_fill(0, count($values), "?"));
    $query = $table->InsertRow($tableName,$cols_string,$values_string);
    $stmt = $this->Connect()->prepare($query);
    return $stmt->execute($values);
  }
  /* 
  ** UpdateRow = TableName, Columns[], Values[], Where ID 
  */
  public function UpdateRow($tableName,$columns,$values,$id){
    $table = new QueryBuilder();
    if (count($columns) !== count($values)) {
      throw new Exception('عدد الحقول والقيم غير متساوٍ.');
    }
    $setClause = implode(" = ?, ", $columns) . " = ?";
    $query = $table->UpdateRow($tableName,$setClause,$id);
    $stmt = $this->Connect()->prepare($query);
    return $stmt->execute($values);
  }

  public function DeleteRow($tableName,$id){
    $table = new QueryBuilder();
    $query = $table->DeleteRow($tableName, $id);
    $stmt = $this->Connect()->prepare($query);
    $stmt->execute(['id' => $id]);
  }
  public function CountRows($tableName){
    $table = new QueryBuilder();
    $query = $table->Count_All_Rows($tableName);
    $stmt = $this->Connect()->prepare($query);
    return $stmt->execute();
  }
  public function CountRowsByID($tableName,$id){
    $table = new QueryBuilder();
    $query = $table->Count_Rows_ID($tableName,$id);
    $stmt = $this->Connect()->prepare($query);
    return $stmt->execute($id);
  }
  public function CountRowsByWhere($tableName,$conditions){
    $query = new QueryBuilder();
    $sql = $query->Count_Rows_Where($tableName,$conditions);
    $stmt = $this->Connect()->prepare($sql);
    return $stmt->execute();
  }
}