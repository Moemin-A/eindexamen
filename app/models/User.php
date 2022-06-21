<?php
  class Leerling {
    private $db;

    public function __construct() {
      $this->db = new Database();
    }

    public function getUsers() {
      $this->db->query("SELECT * FROM `leerlingrijlessen`;");

      $result = $this->db->resultSet();

      return $result;
    }
  }

?>