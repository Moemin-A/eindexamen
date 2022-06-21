<?php

  use TDD\libraries\Database;

  class Instructeur {
    // Properties, fields
    private $db;

    public function __construct() {
      $this->db = new Database();
    }

    public function getInstructeurs() {
      $this->db->query("SELECT * FROM `instructeurs` ORDER BY `id` ASC;");
      $result = $this->db->resultSet();
      return $result;
    }

    public function getSingleInstructeur($id) {
      $this->db->query("SELECT * FROM instructeurs WHERE id = :id");
      $this->db->bind(':id', $id, PDO::PARAM_INT);
      return $this->db->single();
    }

    public function getSingleInstructeurByName($name) {
      $this->db->query("SELECT * FROM instructeurs WHERE name = :name");
      $this->db->bind(':name', $name, PDO::PARAM_STR);
      return $this->db->single();
    }    

    public function createInstructeur($post) {
      try {
        $this->db->query("INSERT INTO mededelingeninstructeurs (id, instructeur, mededelingen) 
        VALUES (:id, :instructeur, :mededelingen)");

        $this->db->bind(':id', NULL);
        $this->db->bind(':instructeur', $post ["instructeur"], PDO::PARAM_INT);
        $this->db->bind(':mededelingen', $post ["mededelingen"], PDO::PARAM_STR);

        return $this->db->execute();
      
      } catch (PDOException $e) {
          logger(__FILE__, __METHOD__, __LINE__, $e->getMessage());
          return 0;
      }
    }
  }

?>