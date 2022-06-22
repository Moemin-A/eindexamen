<?php

namespace TDD\controllers;

use TDD\libraries\Controller;

class Lessen extends Controller 
{
    // Properties, fields
    private $lesModel;

    // Dit is de constructor
    public function __construct()
    {
        $this->lesModel = $this->model('Les');
    }

    public function index()
    {
        /**
         * Haal via de method getCountries() uit de model Docent de records op
         * uit de database
         */
        $lessen = $this->lesModel->getLessen();
        // var_dump($lessen);exit();
        /**
         * Maak de inhoud voor de tbody in de view
         */
        $rows = '';
        foreach ($lessen as $value){
            $rows .= "<tr>
                        <td>" . $value->Id . "</td>
                        <td>" . $value->Datum . "</td>
                        <td>" . $value->Naam . "</td>
                        <td><a href='" . URLROOT . "/lessen/indexopmerking/$value->Id'>Opmerkingen</a></td>
                        <td><a href='" . URLROOT . "/docenten/delete/$value->Id'>Onderwerpen</a></td>
                        </tr>";
        }

        $data = [
        'title' => '<h3>Lessenoverzicht</h3>',
        'lessen' => $rows
        ];
        $this->view('lessen/index', $data);
    }

    public function indexOpmerking()
    {
        /**
         * Haal via de method getCountries() uit de model Docent de records op
         * uit de database
         */
        $lessen = $this->lesModel->getSingleOpmerkingen();

        /**
         * Maak de inhoud voor de tbody in de view
         */
        $rows = '';
        foreach ($lessen as $value){
            $rows .= "<tr>
                        <td>" . $value->Les . "</td>
                        <td>" . $value->Opmerking . "</td>
                        </tr>";
        }

        $data = [
        'title' => '<h3>Lessenoverzicht</h3>',
        'lessen' => $rows
        ];
        $this->view('lessen/indexopmerking', $data);
    }
}
