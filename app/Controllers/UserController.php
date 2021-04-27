<?php

namespace App\Controllers;

use App\Models\People;
use App\Models\Invoice;
use App\Models\Connexion;

class UserController extends Controller
{

    public function home()
    {
        // romain : les 5 derniers people pour la home
        $last5People = (new People())->last5People();
        // fred : les 5 dernières factures
        $lastFiveInvoices = (new Invoice())->readFiveLast();
        //laura : les 5 dernières companies
        $lastCompanies = (new Connexion())->five_last();
        // affiche sur la page d'accueil
        return $this->view('app.home', compact('last5People', 'lastFiveInvoices', 'lastCompanies'));
        
    }

    public function login()
    {

        return $this->view('app.login');
    }
}
?>