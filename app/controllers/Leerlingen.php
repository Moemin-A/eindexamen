<?php
namespace TDD\controllers;

use TDD\libraries\Controller;

class Leerling extends Controller 
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
        $instructeurs = $this->leerlingModel->getLeerling();

        /**
         * Maak de inhoud voor de tbody in de view
         */
        $rows = '';
        foreach ($leerlingen as $value){
            $rows .= "<tr>
                        <td>" . $value->naam . "</td>
                        <td><a href='" . URLROOT . "/docenten/update/$value->id'><i class='bi bi-pencil-square'></i></a></td>
                        <td><a href='" . URLROOT . "/docenten/delete/$value->id'><i class='bi bi-x-square'></i></a></td>
                        </tr>";
        }


        $data = [
        'title' => '<h3>Leerlingensoverzicht</h3>',
        'instructeurs' => $rows
        ];
        $this->view('leerlingen/index', $data);
    }

    public function create() {
        /**
         * Default waarden voor de view create.php
         */

        $data = [
            'title' => '<h3>Doe een mededeling</h3>',
            'id' => '',
            'leerling' => '',
            'mededelingen' => '',
            'leerlingError' => '',
            'mededelingenError' => ''
        ];

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $data = [
            'title' => '<h3>Doe een mededeling</h3>',
            'leerling' => trim($_POST['leerling']),
            'mededelingen' => trim($_POST['mededelingen']),
            'leerlingError' => '',
            'mededelingenError' => ''
            ];

            $data = $this->validateCreateForm($data);
        
            if (empty($data['instructeurError']) && empty($data['mededelingenError'])) {
                if ($this->leerlingModel->createLeerling($_POST)) {
                    echo "<div class='alert alert-success' role='alert'>
                    Mededeling verzonden!
                </div>";
            header("Refresh:3; url=" . URLROOT . "/leerlingen/index");
                }

        } 

        $this->view("leerlingen/create", $data);    
    }

    private function validateCreateForm($data) {
        if (empty($data['leerling'])) {
        $data['leerlingError'] = 'U heeft nog geen leerling ingevuld';
        }

        if (empty($data['mededelingen'])) {
        $data['mededelingenError'] = 'U heeft nog geen mededeling ingevuld';
        }
        return $data;
    }
}