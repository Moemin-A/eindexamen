<?php

namespace TDD\controllers;

use TDD\libraries\Controller;

class Pages extends Controller 
{

    // Hier worden alle willekeurige paginas opgeslagen
    public function index() 
    {

        $this->view('leerling-pagina');
    }

}
