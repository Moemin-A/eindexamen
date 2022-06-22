<?php
  class Gebruiker {
    private $db;

    public function __construct() {
      $this->db = new Database();
}

//Hier haal je alle gebruikers van de database en daarna haal je alleen ROL= Instructeurs
    public function getInstructeurs() {
      $this->db->query("SELECT * from persoon INNER JOIN rol on persoon.RolId = '3' AND rol.Omschrijving = 'instructeur'");

      $result = $this->db->resultSet();

      return $result;
}

//Hier haal je alle gebruikers van de database en daarna haal je alleen ROL= leerling
   public function getLeerlingen(){
    $this->db->query("SELECT * from persoon INNER JOIN rol on persoon.RolId = '4' AND rol.Omschrijving = 'leerling'");
    return $this->db->resultSet();
}

//Hier haal je alle gebruikers van de database
  public function getAll(){
    $this->db->query("SELECT * from persoon INNER JOIN rol on rol.Id = persoon.RolId ORDER BY Rol ASC");
    return $this->db->resultSet();
}

  }

?>