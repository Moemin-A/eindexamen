<?php
  class Auto {
    private $db;

    public function __construct() {
      $this->db = new Database();
    }

    public function getAllCars() {
      $this->db->query("SELECT * FROM `auto`");

      $result = $this->db->resultSet();

      return $result;
    }


    public function createMankement($post){
      $this->db->query("INSERT INTO `mankement`(`Id`, `Auto`, `Datum`, `Mankement`)
                         VALUES(:Id, :Auto , :Datum , :Mankement)");
     
       $this->db->bind(':Id', NULL , PDO::PARAM_INT);
       $this->db->bind(':Auto', $post["Auto"], PDO::PARAM_STR);
       $this->db->bind(':Datum', $post["Datum"], PDO::PARAM_STR);
       $this->db->bind(':Mankement', $post["Mankement"], PDO::PARAM_STR);
     
      return $this->db->execute();
   }

   public function getMankement(){
     $this->db->query("SELECT `Kenteken` FROM `auto` ");
     $this->db->execute();
     return $this->db->resultSet();
   }


  }

?>