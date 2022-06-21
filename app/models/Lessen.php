<?php

class Lessen
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    //  Selects all artikels in artikel depending on categorie number
    public function getLessen($leerling)
    {
        $this->db->query("SELECT * FROM lessen WHERE Leerling = :id ORDER BY `Datum` ASC");
        $this->db->bind(":id", $leerling);
        return  $this->db->resultSet();
    }

    // Fetches post request from controller submit and inserts artikel
    public function artikelInsert($post)
    {
        try {
            // prepare sql and bind parameters
            // var_dump($post); echo "Hallo";exit();

            $this->db->query("INSERT INTO artikel  (Id, Omschrijving, TijdGeleend, Persoon, CategorieId) 
                              VALUES (:id, :omschrijving, :tijdgeleend, :persoon, :categorieid)");

            $this->db->bind(":id", NULL);
            $this->db->bind(":omschrijving", $post["omschrijving"]);
            $this->db->bind(":tijdgeleend", ($post["tijdgeleend"]));
            $this->db->bind(":persoon", ($post["persoon"]));
            $this->db->bind(":categorieid", ($post["categorieid"]));


            $this->db->execute(); //exit();

            // Checks for success / errors and prints message accordingly
            header("Refresh:1; url = " . URLROOT . "artikels/creating-success");
        } catch (PDOException $e) {
            header("Refresh:1; url = " . URLROOT . "artikels/creating-failed");
        }
    }
}
