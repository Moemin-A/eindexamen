<?php

class Lessen
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    //  Selects all lessen in lessen depending on leerling number
    public function getLessen($leerling)
    {
        $this->db->query("SELECT * FROM lessen WHERE Leerling = :id ORDER BY `Datum` ASC");
        $this->db->bind(":id", $leerling);
        return  $this->db->resultSet();
    }

    // Fetches post request from controller submit and inserts opmerking
    public function opmerkingInsert($post)
    {
        try {
            // prepare sql and bind parameters
            // var_dump($post); echo "Hallo";exit();
            $this->db->query("INSERT INTO opmerkingen  (ID, LES, Opmerking) 
                                VALUES (:id, :lesid, :opmerking)");

            $this->db->bind(":id", NULL);
            $this->db->bind(":lesid", $post["lesid"]);
            $this->db->bind(":opmerking", ($post["opmerking"]));
       
            $this->db->execute(); //exit();

            // Checks for success / errors and prints message accordingly
            echo '<div class="alert alert-success mt-5 w-50 mx-auto text-center" role="alert">
            Opmerking toegevoegd.
            </div>';
            header("Refresh: 3; /Les/insertOpmerking");
        } catch (PDOException $e) {
            echo '<div class="alert alert-danger mt-5 w-50 mx-auto text-center" role="alert">
            Er is iets fout gegaan bij het toevoegen.
            </div>';
            header("Refresh: 3; /Les/insertOpmerking");
        }
    }
}
