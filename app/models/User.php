<?php
  class Instructeur {
    private $db;

    public function __construct() {
      $this->db = new Database();
    }

    public function getUsers() {
      $this->db->query("SELECT * FROM `instructeurs`;");

      $result = $this->db->resultSet();

      return $result;
    }
  }

?>