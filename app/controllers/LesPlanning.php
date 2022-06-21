<?php

namespace TDD\controllers;

use TDD\libraries\Controller;

class LesPlanning extends Controller
 {

    public function __contstruct()
    {
      $this->lesModel = $this->model('Lessen');
    }
  
    // public function index($message = "") 
    // {

    // // Als message leeg is switch case maken met goed / fout meldingen
    // if (!empty($message)) {
    //         switch ($message) {
    //             case 'creating-success':
    //                 echo '<div class="alert alert-success mt-5 w-50 mx-auto text-center" role="alert">
    //                 Succesvol toegevoegd.
    //                 </div>';
    //                 header("Refresh: 3; /LesPlanning/insertLes");
    //                 break;
    //             case 'creating-failed':
    //                 echo'<div class="alert alert-danger mt-5 w-50 mx-auto text-center" role="alert">
    //                 Er is iets fout gegaan bij het toevoegen.
    //                 </div>';
    //                 header("Refresh: 5; /LesPlanning/insertLes");
    //                 break;
    //         }
    //     }
    // }
    
    // InsertController die als je niet in POST zit naar de artikel toevoegen view stuurd
    // Als dit wel zo is word je doorgestuurd naar de insertAanvraag() model
    public function insertLes() 
    {
        // Initialiseer het $data array
        $data = [
            // 'klantnummer' => '',
            // 'klantnummerError' => '',
            'datumentijd' => '',
            'datumentijdError' => '',
            'adres' => '',
            'adresError' => '',
            'lesdoel' => '',
            'lesdoelError' => ''
        ];
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $data = [
                // 'klantnummer' => trim($_POST['klantnummer']),
                // 'klantnummerError' => '',
                'datumentijd' => trim($_POST['datumentijd']),
                'datumentijdError' => '',
                'adres' => trim($_POST['adres']),
                'adresError' => '',
                'lesdoel' => trim($_POST['lesdoel']),
                'lesdoelError' => ''
            ];

            $data = $this->validateCreateForm($data);

            if (empty($data['datumentijdError']) && empty($data['adresError']) && empty($data['lesdoelError']) ) {
                $lessen = $this->model('Lessen');
                $lessen->lesInsert($_POST);
            }

        } {
            $this->view('lessen/les-inplannen', $data);
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
        // $persoonValidation = "/^[0-9]*$/";

        if (empty($data['lesdoel'])){
            $data['lesdoelError'] = '<div class="alert alert-danger mt-10 w-55 mx-auto text-center" role="alert">
            Vul het lesdoel in.
            </div>';
        }elseif (filter_var($data['lesdoel'], FILTER_VALIDATE_EMAIL)){
            $data['lesdoelError'] = '<div class="alert alert-danger mt-10 w-55 mx-auto text-center" role="alert">
            U heeft een emailadres ingevuld, graag een lesdoel invullen
            </div>';
        }elseif (!preg_match($omschrijvingValidation, $data['lesdoel'])){
            $data['lesdoelError'] = '<div class="alert alert-danger mt-10 w-55 mx-auto text-center" role="alert">
            U mag alleen (hoofd)letters gebruiken voor het lesdoel.
            </div>';
        }

        if (empty($data['adres'])){
            $data['adresError'] = '<div class="alert alert-danger mt-10 w-55 mx-auto text-center" role="alert">
            Vul het adres in.
            </div>';
        }elseif (filter_var($data['adres'], FILTER_VALIDATE_EMAIL)){
            $data['adresError'] = '<div class="alert alert-danger mt-10 w-55 mx-auto text-center" role="alert">
            U heeft een emailadres ingevuld, graag uw adres invullen
            </div>';
        }

        // if (empty($data['klantnummer'])){
        //     $data['klantnummerError'] = '<div class="alert alert-danger mt-10 w-55 mx-auto text-center" role="alert">
        //     Vul het klantnummer in.
        //     </div>';
        // }/*elseif (filter_var($data['persoon'], FILTER_VALIDATE_INT)){
        //     $data['persoonError'] = '<div class="alert alert-danger mt-10 w-55 mx-auto text-center" role="alert">
        //     U heeft geen geheel getal ingevuld.
        //     </div>';}*/
        // elseif (!preg_match($persoonValidation, $data['klantnummer'])){
        //     $data['klantnummerError'] = '<div class="alert alert-danger mt-10 w-55 mx-auto text-center" role="alert">
        //     U heeft een letter ingevuld, vul graag een persoonsnummer invullen.
        //     </div>';
        // }
        return $data;
    }

}