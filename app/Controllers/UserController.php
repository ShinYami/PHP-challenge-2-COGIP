<?php

namespace App\Controllers;

use App\Models\Invoice;
use App\Models\People;

class UserController extends Controller
{

    public function home()
    {
        // romain les 5 derniers people pour la home
        $last5People = (new People())->last5People();
        return $this->view('app.home', compact('invoice'));
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
