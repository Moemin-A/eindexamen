<?php

class Lessen
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    // Fetches post request from controller submit and inserts les
    public function lesInsert($post)
    {
        try {
            // prepare sql and bind parameters
            // var_dump($post); echo "Hallo";exit();
            $this->db->query("INSERT INTO lesplanning  (Id, DatumTijd, Ophaaladres, Lesdoel, LeerlingId) 
                              VALUES (:id, :datumentijd, :adres, :lesdoel, :leerlingid)");

            $this->db->bind(":id", NULL);
            $this->db->bind(":datumentijd", $post["datumentijd"]);
            $this->db->bind(":adres", ($post["adres"]));
            $this->db->bind(":lesdoel", ($post["lesdoel"]));
            $this->db->bind(":leerlingid", ($post["leerlingid"]));


            $this->db->execute(); //exit();

            // Checks for success / errors and prints message accordingly
            echo '<div class="alert alert-success mt-5 w-50 mx-auto text-center" role="alert">
            Succesvol toegevoegd.
            </div>';
            header("Refresh: 3; /LesPlanning/insertLes");
        } catch (PDOException $e) {
            echo '<div class="alert alert-danger mt-5 w-50 mx-auto text-center" role="alert">
            Er is iets fout gegaan bij het toevoegen.
            </div>';
            header("Refresh: 3; /LesPlanning/insertLes");
        }
    }
}
