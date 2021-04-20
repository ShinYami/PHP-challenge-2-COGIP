<?php

namespace App\Controllers;

use App\Models\Connexion;

class SocietiesController extends Controller {

    public function annuaire() {
        $clients = new Connexion();
        $clients = $clients->clients();
        $fournisseurs = new Connexion();
        $fournisseurs = $fournisseurs->fournisseurs();
        return $this->view('app.societes.annuaire', compact("clients", "fournisseurs"));
    }

    public function details($id) {
        $companyInfos = new Connexion();
        $companyInfos = $companyInfos->company_infos($id);
        $contactId = new Connexion();
        $contactId = $contactId->contact_by_id($id);
        $invoiceId = new Connexion();
        $invoiceId = $invoiceId->invoice_by_id($id);
        return $this->view('app.societes.society', compact("companyInfos", "contactId", "invoiceId"));
    }

    public function delete_company($id) {
        $deleteCompany = new Connexion();
        $deleteCompany = $deleteCompany->delete_infos_company($id);
        return $this->view('app.societes.deleteCompany', compact("deleteCompany"));
    }
}