<?php

  use TDD\libraries\Database;

  class Leerling {
    // Properties, fields
    private $db;

    public function __construct() {
      $this->db = new Database();
    }

    public function getLeerlingen() {
      $this->db->query("SELECT * FROM `leerlingrijlessen` ORDER BY `id` ASC;");
      $result = $this->db->resultSet();
      return $result;
    }

    public function getSingleLeerling($id) {
      $this->db->query("SELECT * FROM leerlingrijlessen WHERE id = :id");
      $this->db->bind(':id', $id, PDO::PARAM_INT);
      return $this->db->single();
    }

    public function getSingleLeerlingByName($name) {
      $this->db->query("SELECT * FROM leerlingrijlessen WHERE name = :name");
      $this->db->bind(':name', $name, PDO::PARAM_STR);
      return $this->db->single();
    }    
  }

?>