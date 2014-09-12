<?php

class Materials {
  private $db;

  public function __construct($database){
    $this->db = $database;
  }
}