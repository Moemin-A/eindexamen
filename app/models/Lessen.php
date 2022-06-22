<?php

class Lessen
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    //  Selects innerjoined records from lessen and returns to les controller 
    public function getLessen($leerling)
    {
        $this->db->query("SELECT 
        Lessen.Datum,
        Leerling.straat,
        Leerling.Woonplaats,
        Instructeur.Naam
        FROM Lessen 
        INNER JOIN Leerling ON Lessen.leerling = Leerling.Id
        INNER JOIN Instructeur ON Instructeur.Email = Lessen.instructeur
        WHERE Leerling = :id AND Datum > CURDATE() ORDER BY `Datum` ASC");
        $this->db->bind(":id", $leerling);
        return  $this->db->resultSet();
    }

    // Fetches post request from controller submit and inserts opmerking
    public function wijzigingInsert($post)
    {
        try {
            // prepare sql and bind parameters
            // var_dump($post); echo "Hallo";exit();
            $this->db->query("INSERT INTO alternatieveophaallocatie  (ID, LES, Straat, Woonplaats) 
                                VALUES (:id, :lesid, :straat, :woonplaats)");

            $this->db->bind(":id", NULL);
            $this->db->bind(":lesid", $post["lesid"]);
            $this->db->bind(":straat", ($post["straat"]));
            $this->db->bind(":straat", ($post["woonplaats"]));
       
            $this->db->execute(); //exit();

            // Checks for success / errors and prints message accordingly
            echo '<div class="alert alert-success mt-5 w-50 mx-auto text-center" role="alert">
            Opmerking toegevoegd.
            </div>';
            header("Refresh: 3; /Les/insertWijziging");
        } catch (PDOException $e) {
        
            echo '<div class="alert alert-danger mt-5 w-50 mx-auto text-center" role="alert">
            Er is iets fout gegaan bij het toevoegen.
            </div>';
            header("Refresh: 3; /Les/insertWijziging");
        }
    }
}
