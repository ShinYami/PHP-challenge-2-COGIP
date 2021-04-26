<?php

namespace App\Controllers;

use App\Models\Connexion;

class SocietiesController extends Controller
{

    public function annuaire()
    {
        $clients = new Connexion();
        $clients = $clients->clients();
        $fournisseurs = new Connexion();
        $fournisseurs = $fournisseurs->fournisseurs();
        return $this->view('app.societes.annuaire', compact("clients", "fournisseurs"));
    }

    public function details($id)
    {
        $companyInfos = new Connexion();
        $companyInfos = $companyInfos->company_infos($id);
        $contactId = new Connexion();
        $contactId = $contactId->contact_by_id($id);
        $invoiceId = new Connexion();
        $invoiceId = $invoiceId->invoice_by_id($id);
        return $this->view('app.societes.society', compact("companyInfos", "contactId", "invoiceId"));
    }

    public function new_company()
    {
        $newCompany = new Connexion();
        $newCompany = $newCompany->company_infos_all();
        return $this->view('app.admin.newCompany', compact("newCompany"));
    }

    public function new_company_post()
    {
        $newCompanyPost = new Connexion();
        $newCompanyPost = $newCompanyPost->create_infos_company($_POST);
        if (!$newCompanyPost) {
            // fail
            return header('Location: /newCompany');
        } else {
            // ok
            return header('Location: /newCompany');
        }
    }

    public function delete_company(int $id) {
        $deleteCompany = new Connexion();
        $deleteCompany = $deleteCompany->delete_infos_company($id);

        if (!$deleteCompany) {
            return header('Location: /annuaire'); // failed;
        } else {
            return header('Location: /annuaire'); // ok;
        }
    return $this->view('app.societes.deleteCompany', compact("deleteCompany"));
    }
}
