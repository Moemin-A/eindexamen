<?php
  class Les {
    private $db;

    public function __construct() {
      $this->db = new Database();
    }

    public function getUsers() {
      $this->db->query("SELECT * FROM `lessen`;");

      $result = $this->db->resultSet();

      return $result;
    }
  }

?>