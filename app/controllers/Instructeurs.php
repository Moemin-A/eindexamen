<?php
namespace TDD\controllers;

use TDD\libraries\Controller;

class Instructeurs extends Controller 
{
    // Properties, fields
    private $instructeurModel;

    // Dit is de constructor
    public function __construct()
    {
        $this->instructeurModel = $this->model('Instructeur');
    }

    public function index()
    {
        /**
         * Haal via de method getCountries() uit de model Docent de records op
         * uit de database
         */
        $instructeurs = $this->instructeurModel->getInstructeurs();

        /**
         * Maak de inhoud voor de tbody in de view
         */
        $rows = '';
        foreach ($instructeurs as $value){
            $rows .= "<tr>
                        <td>" . $value->naam . "</td>
                        <td>" . $value->tel . "</td>
                        <td>" . $value->geslacht . "</td>
                        <td><a href='" . URLROOT . "/docenten/update/$value->id'><i class='bi bi-pencil-square'></i></a></td>
                        <td><a href='" . URLROOT . "/docenten/delete/$value->id'><i class='bi bi-x-square'></i></a></td>
                        </tr>";
        }


        $data = [
        'title' => '<h3>Instructeursoverzicht</h3>',
        'instructeurs' => $rows
        ];
        $this->view('instructeurs/index', $data);
    }

    public function create() {
        /**
         * Default waarden voor de view create.php
         */

        $data = [
            'title' => '<h3>Doe een mededeling</h3>',
            'id' => '',
            'instructeur' => '',
            'mededelingen' => '',
            'instructeurError' => '',
            'mededelingenError' => ''
        ];

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $data = [
            'title' => '<h3>Doe een mededeling</h3>',
            'instructeur' => trim($_POST['instructeur']),
            'mededelingen' => trim($_POST['mededelingen']),
            'instructeurError' => '',
            'mededelingenError' => ''
            ];

            $data = $this->validateCreateForm($data);
        
            if (empty($data['instructeurError']) && empty($data['mededelingenError'])) {
                if ($this->instructeurModel->createInstructeur($_POST)) {
                    header("Location:" . URLROOT . "/instructeurs/index");
                } else {
                    echo "<div class='alert alert-danger' role='alert'>
                            Er heeft een interne servererror plaatsgevonden<br>probeer het later nog eens...
                        </div>";
                    header("Refresh:3; url=" . URLROOT . "/instructeurs/index");
                }
            }
        } 

        $this->view("instructeurs/create", $data);    
    }

    private function validateCreateForm($data) {
        if (empty($data['instructeur'])) {
        $data['instructeurError'] = 'U heeft nog geen instructeur ingevuld';
        }

        if (empty($data['mededelingen'])) {
        $data['mededelingenError'] = 'U heeft nog geen mededeling ingevuld';
        }
        return $data;
    }
    
}