<?php

namespace TDD\controllers;

use TDD\libraries\Controller;

use \PDOException;


class Les extends Controller
 {

    public function __contstruct()
    {
      $this->lesModel = $this->model('Lessen');
    }
  
    public function index($message = "") 
    {

    // Als message leeg is switch case maken met goed / fout meldingen
    if (!empty($message)) {
            switch ($message) {
                case 'reading-failed':
                    echo '<div class="alert alert-danger mt-5 w-50 mx-auto text-center" role="alert">
                    Kan de schema niet lezen, probeer het later opnieuw.
                    </div>';
                    header("Refresh: 3; /index");
                    break;
                // case 'creating-success':
                //     echo '<div class="alert alert-success mt-5 w-50 mx-auto text-center" role="alert">
                //     Opmerking toegevoegd
                //     </div>';
                //     header("Refresh: 3; /les");
                //     break;
                // case 'creating-failed':
                //     echo '<div class="alert alert-danger mt-5 w-50 mx-auto text-center" role="alert">
                //     Er is iets fout gegaan bij het toevoegen.
                //     </div>';
                //     header("Refresh: 5; /les");
                //     break;
            }
        }
       
    // Artikels tonen met de juiste leerling en naar de lessen model sturen 
    $lessen = $this->model('Lessen');

        try {
            $records1 = "";
            foreach ($lessen->getLessen(3) as $record) {
                $records1 .= "<tr>
                <th scope='row'>" . $record->Datum . " </th>
                <td> " . $record->Onderdeel . "</td>
                </td></tr>";   
            }

        } catch (PDOException $e) { 
            header("Refresh:3; url = " . URLROOT . "les/reading-failed");
        }
        // Data bewaren in een array en naar lessen view sturen
        $data = [
            "records1" => $records1,
            // "records2" => $records2,
         
        ];

        // var_dump($data);

        $this->view('lessen/lessen', $data);
    }

    // InsertController die als je niet in POST zit naar de les opmerking view stuurd
    // Als dit wel zo is wordt je doorgestuurd naar de lessen model via de functie opmerkingInsert
    public function insertOpmerking() 
    {
        // Initialiseer het $data array
        $data = [
            'opmerking' => '',
            'opmerkingError' => ''
        ];
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $data = [
                'opmerking' => trim($_POST['opmerking']),
                'opmerkingError' => ''
            ];

            $data = $this->validateCreateForm($data);

            if (empty($data['opmerkingError']) ) {
                $lessen = $this->model('Lessen');
                $lessen->opmerkingInsert($_POST);
            }

        } {
            $this->view('lessen/les-opmerking', $data);
        }
        
    }

    // Unit test
    public function sayMyName($name)
    {
        return "Hallo mijn naam is : " . $name;
    }

    // Error messages on input 
    private function validateCreateForm($data) {

        $omschrijvingValidation = "/^[a-zA-Z]*$/";

        if (empty($data['opmerking'])){
            $data['opmerkingError'] = '<div class="alert alert-danger mt-10 w-55 mx-auto text-center" role="alert">
            opmerking leeg.
            </div>';
        }elseif (filter_var($data['opmerking'], FILTER_VALIDATE_EMAIL)){
            $data['opmerkingError'] = '<div class="alert alert-danger mt-10 w-55 mx-auto text-center" role="alert">
            U heeft een emailadres ingevuld, graag een opmerking invullen
            </div>';
        }

        return $data;
    }
    
}