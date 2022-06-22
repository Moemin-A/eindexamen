<?php
  class Gebruiker {
    private $db;

    public function __construct() {
      $this->db = new Database();
}
 

//Hier haal je alle AantalLessen, Prijs, BetaalTermijnen van de database waarbij de prijs=400
   public function getPakket(){
    $this->db->query("SELECT AantalLessen, Prijs, BetaalTermijnen FROM `pakketten` WHERE Prijs =400");
    return $this->db->resultSet();
   }

   public function getLessen(){
    $this->db->query("SELECT * from lessen INNER JOIN Leerling on lessen.Leerling = Leerling.Id WHERE leerling.id = 3 AND lessen.Datum  <= '2022-06-22' ");
    return $this->db->resultSet();   
}

public function getNogLessen(){
  $this->db->query("SELECT * from lessen INNER JOIN Leerling on lessen.Leerling = Leerling.Id WHERE leerling.id = 3 AND lessen.Datum  >= '2022-06-22' ");
  $this->db->execute();
  return $this->db->rowCount();
}
  }
?>