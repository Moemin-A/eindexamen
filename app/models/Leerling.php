<?php

  use TDD\libraries\Database;

  class Instructeur {
    // Properties, fields
    private $db;

    public function __construct() {
      $this->db = new Database();
    }

    public function getLeerlingen() {
      $this->db->query("SELECT * FROM `leerling` ORDER BY `id` ASC;");
      $result = $this->db->resultSet();
      return $result;
    }

    public function getSingleLeerling($id) {
      $this->db->query("SELECT * FROM leerling WHERE id = :id");
      $this->db->bind(':id', $id, PDO::PARAM_INT);
      return $this->db->single();
    }

    public function getSingleLeerlingByName($name) {
      $this->db->query("SELECT * FROM leerling WHERE name = :name");
      $this->db->bind(':name', $name, PDO::PARAM_STR);
      return $this->db->single();
    }    

    public function createLeerling($post) {
      try {
        $this->db->query("INSERT INTO mededelingenleerling (id, leerling, mededelingen) 
        VALUES (:id, :leerling, :mededelingen)");

        $this->db->bind(':id', NULL);
        $this->db->bind(':leerling', $post ["instructeur"], PDO::PARAM_INT);
        $this->db->bind(':mededelingen', $post ["mededelingen"], PDO::PARAM_STR);

        return $this->db->execute();
      
      } catch (PDOException $e) {
          logger(__FILE__, __METHOD__, __LINE__, $e->getMessage());
          return 0;
      }
    }
  }

?>