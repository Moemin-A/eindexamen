<?php

namespace TDD\controllers;

use TDD\libraries\Controller;

// Place where all different pages are stored.
class Pages extends Controller 
{

    public function index() 
    {

        $this->view('instructeur-welcomepage');
    }

}
