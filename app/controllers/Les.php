<?php

namespace TDD\controllers;

use TDD\libraries\Controller;

use \PDOException;


class Les extends Controller
 {

    public function __construct()
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
                <td> " . $record->straat . "</td>
                <td> " . $record->Woonplaats . "</td>
                <td> " . $record->Naam . "</td>
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
    public function insertWijziging() 
    {
        // Initialiseer het $data array
        $data = [
            'lesid' => '',
            'lesidError' => '',
            'straat' => '',
            'straatError' => '',
            'woonplaats' => '',
            'woonplaatsError' => ''
        ];
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $data = [
                'lesid' => trim($_POST['lesid']),
                'lesidError' => '',
                'straat' => trim($_POST['straat']),
                'straatError' => '',
                'woonplaats' => trim($_POST['woonplaats']),
                'woonplaatsError' => ''
            ];

            
            $data = $this->validateCreateForm($data);
            
            if (empty($data['straatError']) && empty($data['woonplaatsError']) && empty($data['lesidError']) ) {
                //echo "Hoi";exit();
                $lessen = $this->lesModel->wijzigingInsert($_POST);
            }

        } {
            $this->view('lessen/ophaal-locatie', $data);
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


        if (empty($data['lesid'])){
            $data['lesidError'] = '<div class="alert alert-danger mt-10 w-55 mx-auto text-center" role="alert">
            Geen datum gekozen
            </div>';
        }

        if (empty($data['straat'])){
            $data['straatError'] = '<div class="alert alert-danger mt-10 w-55 mx-auto text-center" role="alert">
            straat leeg.
            </div>';
        }elseif (filter_var($data['straat'], FILTER_VALIDATE_EMAIL)){
            $data['straatError'] = '<div class="alert alert-danger mt-10 w-55 mx-auto text-center" role="alert">
            U heeft een emailadres ingevuld, graag een straat invullen
            </div>';
        }

        if (empty($data['woonplaats'])){
            $data['woonplaatsError'] = '<div class="alert alert-danger mt-10 w-55 mx-auto text-center" role="alert">
            woonplaats leeg.
            </div>';
        }elseif (filter_var($data['woonplaats'], FILTER_VALIDATE_EMAIL)){
            $data['woonplaatsError'] = '<div class="alert alert-danger mt-10 w-55 mx-auto text-center" role="alert">
            U heeft een emailadres ingevuld, graag een woonplaats invullen
            </div>';
        }

        return $data;
    }
    
}