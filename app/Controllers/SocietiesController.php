<?php

namespace App\Controllers;

class SocietiesController extends Controller
{

    public function annuaire()
    {

        return $this->view('app.societes.annuaire');
    }
}
