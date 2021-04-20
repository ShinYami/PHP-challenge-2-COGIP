<?php

namespace App\Controllers;

use App\Models\Invoice;

class UserController extends Controller
{

    public function home()
    {

        return $this->view('app.home');
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

    public function login()
    {

        return $this->view('app.login');
    }
}
