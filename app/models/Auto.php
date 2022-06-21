<?php
  class Gebruiker {
    private $db;

    public function __construct() {
      $this->db = new Database();
    }

    public function getAllGebruikers() {
      $this->db->query("SELECT * FROM `artikel`;");

      $result = $this->db->resultSet();

      return $result;
    }

    public function getSingle($id){
      $this->db->query("SELECT * FROM artikel WHERE id = :id");
      $this->db->bind(':id', $id, PDO::PARAM_INT);
     return($this->db->single()); 

    }

    public function updateGebruiker($post){
      $this->db->query("UPDATE artikel
                          SET omschrijving = :omschrijving, 
                          AantalInBeschikking= :AantalInBeschikking,
                          AantalInLeen= :AantalInLeen, 
                          CatogorieId= :CatogorieId 
                          WHERE id = :id"); 
          
        $this->db->bind(':id', $post["id"], PDO::PARAM_INT);
        $this->db->bind(':omschrijving', $post["omschrijving"], PDO::PARAM_STR);
        $this->db->bind(':AantalInBeschikking', $post["AantalInBeschikking"], PDO::PARAM_INT);
        $this->db->bind(':AantalInLeen', $post["AantalInLeen"], PDO::PARAM_INT);
        $this->db->bind(':CatogorieId', $post["CatogorieId"], PDO::PARAM_INT);
      
       return $this->db->execute();
    }

    public function deleteGebruiker($id){

      $this->db->query("DELETE FROM artikel WHERE id = :id ");
      $this->db->bind("id", $id , PDO::PARAM_INT);
      return $this->db->execute();
    }

    public function createGebruiker($post){
      $this->db->query("INSERT INTO artikel(id, omschrijving, AantalInBeschikking,AantalInLeen, CatogorieId )
                         VALUES(:id, :omschrijving, :AantalInBeschikking, :AantalInLeen, :CatogorieId)");
     
       $this->db->bind(':id', NULL , PDO::PARAM_INT);
       $this->db->bind(':omschrijving', $post["omschrijving"], PDO::PARAM_STR);
       $this->db->bind(':AantalInBeschikking', $post["AantalInBeschikking"], PDO::PARAM_INT);
       $this->db->bind(':AantalInLeen', $post["AantalInLeen"], PDO::PARAM_INT);
       $this->db->bind(':CatogorieId', $post["CatogorieId"], PDO::PARAM_INT);
     
      return $this->db->execute();
   }

   public function getCatogorieId(){
     $this->db->query('SELECT Catogoriecode from Catogorie');
     $this->db->execute();
     return $this->db->resultSet();
   }

   public function getAllGebruikersAdmin(){
    $this->db->query("SELECT omschrijving,AantalInBeschikking,AantalInLeen,Catogorienaam,CatogorieId FROM catogorie INNER JOIN artikel on artikel.CatogorieId = catogorie.Catogoriecode");
    return $this->db->resultSet();
}
   public function getSingleAdmin(){
    $this->db->query("SELECT * FROM artikel INNER JOIN catogorie on artikel.CatogorieId = catogorie.Catogoriecode");
    return $this->db->single();
}

  }

?>