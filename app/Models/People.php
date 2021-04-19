<?php

namespace App\Models;

class People extends Manager
{


    public function all()
    {
        $bdd = $this->dbConnect();

        $requete = "SELECT invoice_number, invoice_date, company_name, type_name FROM invoice, company, typeofcompany WHERE invoice.company_id=company.company_id AND company.type_id=typeofcompany.type_id ORDER BY invoice.invoice_date DESC";

        $resultat = $bdd->prepare($requete);
        $resultat->execute();

        return $resultat->fetchAll();
    }
}
