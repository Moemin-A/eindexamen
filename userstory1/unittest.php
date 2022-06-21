<?php

  use TDD\libraries\Database;

  class voertuig {
    // Properties, fields
    private $db;

    public function construct() {
      $this->db = new Database();
    }

    public function getvoertuig() {
      $this->db->query("SELECT * FROM voertuig ORDER BY id ASC;");
      $result = $this->db->resultSet();
      return $result;
    }

    public function getSinglevoertuig($id) {
      $this->db->query("SELECT * FROM voertuig WHERE id = :id");
      $this->db->bind(':id', $id, PDO::PARAM_INT);
      return $this->db->single();
    }

    public function getSinglevoertuigByName($name) {
      $this->db->query("SELECT * FROM voertuig WHERE name = :name");
      $this->db->bind(':name', $name, PDO::PARAM_STR);
      return $this->db->single();
    }

    public function createvoertuig($post) {
      try {
        $this->db->query("INSERT INTO mededelingenvoertuig(voertuig, mededelingen)
                          VALUES(:voertuig, :mededelingen)");

        $this->db->bind(':voertuig', $post ["voertuig"], PDO::PARAM_STR);
        $this->db->bind(':mededelingen', $post ["mededelingen"], PDO::PARAM_STR);

        return $this->db->execute();

      } catch (PDOException $e) {
          logger(FILE, METHOD, LINE__, $e->getMessage());
          return 0;
      }
    }
  }

?>