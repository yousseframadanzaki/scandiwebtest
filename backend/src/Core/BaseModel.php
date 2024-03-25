<?php

namespace App\Core;

use App\Core\DataBase;

abstract class BaseModel {

  private $table;
  private $DB;

  abstract public function toArray();
  abstract public function fromArray($data);

  protected function __construct($table) {
    $this->table = $table;
    $this->DB = new DataBase("database","scandi", "root", "root");
  }


  public function get_all(){
    return $this->DB->select("SELECT * FROM {$this->table}");
  }

  public function save(){
    $data = $this->toArray();
    $coloums = implode(',',array_keys($data));
    $parameters = implode(',',array_fill(0,count($data),'?'));
    $parameter_values = array_values($data);
    $stmt = "INSERT INTO {$this->table} ({$coloums}) VALUES ({$parameters})";
    return $this->DB->insert($stmt,$parameter_values);
  }

  public function delete_in($ids){
    $parameters = implode(',',array_fill(0,count($ids),'?'));
    $parameter_values = array_values($ids);
    $stmt = "DELETE FROM {$this->table} WHERE id IN ({$parameters})";
    return $this->DB->query($stmt,$parameter_values);
  }

}


?>