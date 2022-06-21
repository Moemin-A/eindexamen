<?php
  class Gebruiker {
    private $db;

    public function __construct() {
      $this->db = new Database();
}

    public function getInstructeurs() {
      $this->db->query("SELECT * from persoon INNER JOIN rol on persoon.RolId = '3' AND rol.Omschrijving = 'instructeur'");

      $result = $this->db->resultSet();

      return $result;
}


   public function getLeerlingen(){
    $this->db->query("SELECT * from persoon INNER JOIN rol on persoon.RolId = '4' AND rol.Omschrijving = 'leerling'");
    return $this->db->resultSet();
}

  public function getAll(){
    $this->db->query("SELECT * from persoon INNER JOIN rol on rol.Id = persoon.RolId ORDER BY Rol ASC");
    return $this->db->resultSet();
}

  }

?>