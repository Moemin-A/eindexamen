<?php

  use TDD\libraries\Database;

  class leerling {
    // Properties, fields
    private $db;

    public function construct() {
      $this->db = new Database();
    }

    public function getleerling() {
      $this->db->query("SELECT * FROM leerling ORDER BY id ASC;");
      $result = $this->db->resultSet();
      return $result;
    }

    public function getSingleleerling($id) {
      $this->db->query("SELECT * FROM leerling WHERE id = :id");
      $this->db->bind(':id', $id, PDO::PARAM_INT);
      return $this->db->single();
    }

    public function getSingleleerlingByName($name) {
      $this->db->query("SELECT * FROM leerling WHERE name = :name");
      $this->db->bind(':name', $name, PDO::PARAM_STR);
      return $this->db->single();
    }

    public function createleerling($post) {
      try {
        $this->db->query("INSERT INTO mededelingenleerling(leerling, mededelingen)
                          VALUES(:leerling, :mededelingen)");

        $this->db->bind(':leerling', $post ["leerling"], PDO::PARAM_STR);
        $this->db->bind(':mededelingen', $post ["mededelingen"], PDO::PARAM_STR);

        return $this->db->execute();

      } catch (PDOException $e) {
          logger(FILE, METHOD, LINE__, $e->getMessage());
          return 0;
      }
    }
  }

?>