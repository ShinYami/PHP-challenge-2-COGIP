<?php

namespace App\Controllers;

use App\Models\Clients;
use App\Models\Fournisseurs;

class SocietiesController extends Controller
{

    public function annuaire() {
        $clients = new Clients();
        $clients = $clients->all();
        $fournisseurs = new Fournisseurs();
        $fournisseurs = $fournisseurs->all();
        // var_dump($societies);
        // die;
        return $this->view('app.societes.annuaire', compact("clients", "fournisseurs"));
    }

    public function details($company_name) {
        //obligé d'avoir un id de l'entreprise pour renvoyer les donnees
        $society = new Clients();
        $society = $society->find_by_id($company_name);
        return $this->view('app.societes.society', compact("society"));
    }
}