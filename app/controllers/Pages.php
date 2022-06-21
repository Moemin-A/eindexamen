<?php

namespace TDD\controllers;

use TDD\libraries\Controller;

class Pages extends Controller 
{

    public function index() 
    {

        $this->view('leerling-pagina');
    }

}
