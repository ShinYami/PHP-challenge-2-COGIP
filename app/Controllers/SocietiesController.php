<?php

namespace App\Controllers;

class SocietiesController extends Controller
{

    public function annuaire() {

        return $this->view('app.societes.annuaire');
    }

    public function contact()
    {

        $invoice = (new Invoice())->all();
        $clients = (new Invoice())->all();
        return $this->view('app.bonjour', compact('invoice', 'clients'));
    }

    public function contactPost()
    {

        $invoice = (new Invoice())->all();
        return $this->view('app.bonjour', compact('invoice'));
    }
}