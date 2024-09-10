<?php

namespace Classes\Databases;

class QueryBuilder
{
  // SELECT All Columns From Table
  public function SelectAll($table)
  {
    return "SELECT * FROM $table";
  }
  // SELECT Row From Table By ID
  public function SelectRowByID($table, $id)
  {
    return "SELECT * FROM $table WHERE id ='$id'";
  }
  // SELECT Rows From Table By Conditions
  public function SelectRowByWhere($table, $conditions)
  {
    return "SELECT * FROM $table WHERE $conditions";
  }
  // SELECT All Columns From Table By Conditions
  public function SelectAllWhere($table, $conditions)
  {
    return "SELECT * FROM $table WHERE $conditions";
  }
  // SELECT Columns From Table without Conditions
  public function SelectCols($columns, $table)
  {
    return "SELECT $columns FROM $table";
  }
  // SELECT Columns From Table By ID
  public function SelectColsByID($columns, $table, $id)
  {
    return "SELECT $columns FROM $table WHERE id = '$id'";
  }
  // SELECT Columns From Table With Conditions
  public function SelectColsWhere($columns, $table, $conditions)
  {
    return "SELECT $columns FROM $table WHERE $conditions";
  }
  // Insert New Row
  public function InsertData($table, $columns, $values)
  {
    return "INSERT INTO $table($columns)VALUES($values)";
  }
  // Prepare Data to Update => Convert Data from Array to String
  public function prepareUpdate($array_data)
  {
    $string_data = "";
    foreach ($array_data as $key => $value) {
      $string_data .= "$key = '$value', ";
    }
    $string_data = rtrim($string_data, ", ");
    return $string_data;
  }
  // Update One Row By ID
  public function UpdateData($table, $array_data, $id)
  {
    $update_data = $this->prepareUpdate($array_data);
    return "UPDATE $table SET $update_data WHERE id = '$id'";
  }
  // Update One or More Row By Conditions
  public function UpdateWhere($table, $array_data, $conditions)
  {
    $update_data = $this->prepareUpdate($array_data);
    return "UPDATE $table SET $update_data WHERE $conditions";
  }
  // DELETE By ID
  public function DeleteData($table, $id)
  {
    return "DELETE FROM $table WHERE id = '$id'";
  }

  public function DeleteWhere($table, $conditions)
  {
    return "DELETE FROM $table WHERE $conditions";
  }

  // Get Count Rows
  public function CountRows($table)
  {
    return "SELECT * FROM $table";
  }

  public function CountRowsByID($table, $id)
  {
    return "SELECT * FROM $table WHERE id = '$id'";
  }

  public function CountRowsByWhere($table, $conditions)
  {
    return "SELECT * FROM $table WHERE $conditions";
  }
}
