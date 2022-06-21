<?php
namespace TDD\controllers;

use TDD\libraries\Controller;

class Leerlingen extends Controller 
{
    // Properties, fields
    private $leerlingModel;

    // Dit is de constructor
    public function __construct()
    {
        $this->leerlingModel = $this->model('Leerling');
    }

    public function index()
    {
        /**
         * Haal via de method getCountries() uit de model Docent de records op
         * uit de database
         */
        $leerlingen = $this->leerlingModel->getLeerlingen();

        /**
         * Maak de inhoud voor de tbody in de view
         */
        $rows = '';
        foreach ($leerlingen as $value){
            $rows .= "<tr>
                        <td>" . $value->instructeur . "</td>
                        <td>" . $value->rijles . "</td>
                        <td>" . $value->ophaaladres . "</td>
                        <td>" . $value->lesdoel . "</td>
                        <td>" . $value->commentaar . "</td>
                        <td>" . $value->exameninfo . "</td>
                        <td>" . $value->tegoed . "</td>
                        </tr>";
        }


        $data = [
        'title' => '<h3>Rijlessenoverzicht</h3>',
        'leerlingen' => $rows
        ];
        $this->view('leerlingen/index', $data);
    }
}