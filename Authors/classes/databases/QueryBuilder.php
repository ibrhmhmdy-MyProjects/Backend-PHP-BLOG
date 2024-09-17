<?php

namespace Classes\Databases;

class QueryBuilder
{
  // SELECT Data
  public function Select_All_Table($tableName){
    return "SELECT * FROM $tableName";
  }
  public function Select_Cols_Table($cols,$tableName){
    return "SELECT $cols FROM $tableName";
  }
  public function Select_All_Table_ID($tableName){
    return "SELECT * FROM $tableName WHERE id = ?";
  }
  public function Select_Cols_Table_ID($cols,$tableName){
    return "SELECT $cols FROM $tableName WHERE id = ?";
  }
  public function Select_All_Table_Where($tableName, $conditions){
    return "SELECT * FROM $tableName WHERE $conditions";
  }
  public function Select_Cols_Table_Where($columns, $tableName, $conditions){
    return "SELECT $columns FROM $tableName WHERE $conditions";
  }

  // Insert New Row
  public function InsertRow($tableName, $columns, $values)
  {
    return "INSERT INTO $tableName($columns)VALUES($values)";
  }
  // Update One Row By ID
  public function UpdateRow($tableName, $string_data)
  {
    return "UPDATE $tableName SET $string_data WHERE id = ?";
  }
  // Update One or More Row By Conditions
  public function UpdateRowWhere($tableName, $string_data, $conditions)
  {
    return "UPDATE $tableName SET $string_data WHERE $conditions";
  }
  // DELETE By ID
  public function DeleteRow($tableName)
  {
    return "DELETE FROM $tableName WHERE id = ?";
  }

  public function DeleteWhere($tableName, $conditions)
  {
    return "DELETE FROM $tableName WHERE $conditions";
  }

  // Get Count Rows
  public function Count_All_Rows($tableName)
  {
    return "SELECT count(*) FROM $tableName";
  }

  public function Count_Rows_ID($tableName, $id)
  {
    return "SELECT count(*) FROM $tableName WHERE id = '$id'";
  }

  public function Count_Rows_Where($tableName, $conditions)
  {
    return "SELECT count(*) FROM $tableName WHERE $conditions";
  }
}
