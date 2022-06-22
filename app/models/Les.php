<?php

  use TDD\libraries\Database;

  class Les {
    // Properties, fields
    private $db;

    public function __construct() {
      $this->db = new Database();
    }

    public function getLessen() {
      $this->db->query("SELECT * from lessen INNER JOIN instructeur on lessen.Instructeur = instructeur.Email");
      $result = $this->db->resultSet();
      return $result;
    }

    public function getSingleLes($id) {
      $this->db->query("SELECT * FROM lessen WHERE id = :id");
      $this->db->bind(':id', $id, PDO::PARAM_INT);
      return $this->db->single();
    }

    public function getSingleLesByName($name) {
      $this->db->query("SELECT * FROM lessen WHERE name = :name");
      $this->db->bind(':name', $name, PDO::PARAM_STR);
      return $this->db->single();
    }

    public function getSingleOpmerkingen($id) {
      // echo $id;exit();
      $this->db->query("SELECT * FROM opmerkingen WHERE Les = $id ");
      $result = $this->db->single();
      return $result;
    }

    public function getSingleOnderwerpen() {
      $this->db->query("SELECT * FROM onderwerpen WHERE Les=Les ");
      $result = $this->db->resultSet();
      return $result;
    }
    
  }

?>