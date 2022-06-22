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
  }
?>