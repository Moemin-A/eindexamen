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
        // var_dump($post);exit();
        //echo "dag";exit();
        try {
            // prepare sql and bind parameters
            // var_dump($post); echo "Hallo";exit();
            $this->db->query("INSERT INTO alternatieveophaallocatie  (ID, LES, Straat, Woonplaats) 
                                VALUES (:id, :lesid, :straat, :woonplaats)");

            $this->db->bind(":id", NULL, PDO::PARAM_NULL);
            $this->db->bind(":lesid", $post["lesid"], PDO::PARAM_INT);
            $this->db->bind(":straat", ($post["straat"]), PDO::PARAM_STR);
            $this->db->bind(":woonplaats", ($post["woonplaats"]), PDO::PARAM_STR);
            //var_dump($this->db);exit();
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
