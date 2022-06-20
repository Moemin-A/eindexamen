<?php

namespace TDD\controllers;

use TDD\libraries\Controller;

class LesPlanning extends Controller
 {

    public function __contstruct()
    {
      $this->artikelModel = $this->model('Lessen');
    }
  
    public function index($message = "") 
    {

    // Als message leeg is switch case maken met goed / fout meldingen
    if (!empty($message)) {
            switch ($message) {
                case 'creating-success':
                    echo '<div class="alert alert-success mt-5 w-50 mx-auto text-center" role="alert">
                    Succesvol toegevoegd.
                    </div>';
                    header("Refresh: 3; /LesPlanning");
                    break;
                case 'creating-failed':
                    echo '<div class="alert alert-danger mt-5 w-50 mx-auto text-center" role="alert">
                    Er is iets fout gegaan bij het toevoegen.
                    </div>';
                    header("Refresh: 5; /LesPlanning");
                    break;
            }
        }
    }
    
    // InsertController die als je niet in POST zit naar de artikel toevoegen view stuurd
    // Als dit wel zo is word je doorgestuurd naar de insertAanvraag() model
    public function insertLes() 
    {
        // Initialiseer het $data array
        $data = [
            'omschrijving' => '',
            'omschrijvingError' => '',
            'tijdgeleend' => '',
            'tijdgeleendError' => '',
            'persoon' => '',
            'persoonError' => ''
        ];
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $data = [
                'omschrijving' => trim($_POST['omschrijving']),
                'omschrijvingError' => '',
                'tijdgeleend' => trim($_POST['tijdgeleend']),
                'tijdgeleendError' => '',
                'persoon' => trim($_POST['persoon']),
                'persoonError' => ''
            ];

            $data = $this->validateCreateForm($data);

            if (empty($data['omschrijvingError']) && empty($data['tijdgeleendError']) && empty($data['persoonError'])) {
                $lessen = $this->model('Lessen');
                $lessen->lesInsert($_POST);
            }

        } {
            $this->view('lessen/les-inplannen', $data);
        }
        
    }

    public function sayMyName($name)
    {
        return "Hallo mijn naam is : " . $name;
    }

    private function validateCreateForm($data) {

        $omschrijvingValidation = "/^[a-zA-Z]*$/";
        $persoonValidation = "/^[0-9]*$/";

        if (empty($data['omschrijving'])){
            $data['omschrijvingError'] = '<div class="alert alert-danger mt-10 w-55 mx-auto text-center" role="alert">
            Vul de omschrijving in.
            </div>';
        }elseif (filter_var($data['omschrijving'], FILTER_VALIDATE_EMAIL)){
            $data['omschrijvingError'] = '<div class="alert alert-danger mt-10 w-55 mx-auto text-center" role="alert">
            U heeft een emailadres ingevuld, graag een artikelomschrijving invullen
            </div>';
        }elseif (!preg_match($omschrijvingValidation, $data['omschrijving'])){
            $data['omschrijvingError'] = '<div class="alert alert-danger mt-10 w-55 mx-auto text-center" role="alert">
            U mag alleen (hoofd)letters gebruiken voor de artikelomschrijving.
            </div>';
        }

        if (empty($data['tijdgeleend'])){
            $data['tijdgeleendError'] = '<div class="alert alert-danger mt-10 w-55 mx-auto text-center" role="alert">
            Vul de tijd in.
            </div>';
        }

        if (empty($data['persoon'])){
            $data['persoonError'] = '<div class="alert alert-danger mt-10 w-55 mx-auto text-center" role="alert">
            Vul het persoonsnummer in.
            </div>';
        }/*elseif (filter_var($data['persoon'], FILTER_VALIDATE_INT)){
            $data['persoonError'] = '<div class="alert alert-danger mt-10 w-55 mx-auto text-center" role="alert">
            U heeft geen geheel getal ingevuld.
            </div>';}*/
        elseif (!preg_match($persoonValidation, $data['persoon'])){
            $data['persoonError'] = '<div class="alert alert-danger mt-10 w-55 mx-auto text-center" role="alert">
            U heeft een letter ingevuld, vul graag een persoonsnummer invullen.
            </div>';
        }
        return $data;
    }
    
}