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
        return $this->view('app.home', compact('last5People'));
    }

    public function login()
    {

        return $this->view('app.login');
    }
}
