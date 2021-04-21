<?php

namespace App\Models;

use PDO;

class Invoice extends Manager {

    /* ajouter une nouvelle facture */
    public function create(array $param) {
        $bdd = $this->dbConnect();

        $company_id = "SELECT company_id FROM company WHERE company_name = $company_name;";
        $people_id = "SELECT people_id FROM people WHERE people_firstname = $people_firstname AND people_lastname = $people_lastname AND people_phone = $people_phone AND people_email = $people_email;";
        /*$request = "INSERT INTO invoice (invoice_number, invoice_date, company_id, people_id) VALUES ($invoice_number, $invoice_date, $company_id, $people_id);";*/
        $request = "INSERT INTO invoice (invoice_number, invoice_date, company_id, people_id) VALUES (:NUMBER, :DATE, $company_id, $people_id);";

        $resultat = $bdd->prepare($requete);
        $resultat->bindParam(':NUMBER', $param['invoice_number'], PDO::PARAM_STR);
        $resultat->bindParam(':DATE', $param['invoice_date'], PDO::PARAM_DATE);
        /*$resultat->bindParam(':COMPANYID', $param['invoice_number'], PDO::PARAM_STR);
        $resultat->bindParam(':PEOPLEID', $param['invoice_number'], PDO::PARAM_STR);*/

        $resultat->execute();

        return $resultat->fetchAll();
    }

    /* page des factures */
    public function readAll() {
        $bdd = $this->dbConnect();

        $requete = "SELECT invoice_number, invoice_date, company_name, type_name FROM invoice, company, typeofcompany WHERE invoice.company_id=company.company_id AND company.type_id=typeofcompany.type_id ORDER BY invoice.invoice_date DESC";

        $resultat = $bdd->prepare($requete);
        $resultat->execute();

        return $resultat->fetchAll();
    }

    // renvoie toutes les factures number avec leur id
    public function invoicesNumberId() {
        $bdd = $this->dbConnect();

        $requete = "SELECT invoice_number, invoice_id FROM invoice";

        $resultat = $bdd->prepare($requete);
        $resultat->execute();

        return $resultat->fetchAll();
    }

    /* afficher les 5 dernières factures */
    public function readFiveLast() {
        $bdd = $this->dbConnect();

        $requete = "SELECT invoice_number, invoice_date, company_name FROM invoice, company WHERE invoice.company_id=company.company_id ORDER BY invoice.invoice_date DESC LIMIT 0,5;";

        $resultat = $bdd->prepare($requete);
        $resultat->execute();

        return $resultat->fetchAll();
    }

    /* afficher une facture */
    public function readOne(int $id) {
        $bdd = $this->dbConnect();

        $requete = "SELECT invoice_number, invoice_date company_name, company_tva, type_name, people_firstname, people_lastname, people_email, people_phone FROM invoice, company, typeofcompany, people WHERE invoice.company_id=company.company_id AND company.type_id=typeofcomapny.type_id AND invoice.people_id=people.people_id AND invoice.invoice_id=$id";

        $resultat = $bdd->prepare($requete);
        $resultat->execute();

        return $resultat->fetchAll();
    }

    /* modifier une facture */
    public function update(int $id) {
        $bdd = $this->dbConnect();
        /* ceque je récupère du formulaire */
        $invoice_date = $_POST['invoice_date'];
        $company_name = $_POST['company_name'];
        $type_name = $_POST['type_name'];
        $people_id = $_POST['people_id'];
        /* je vais chercher la donnée demandée dans la table en fonction de ce que j'ai reçu dans le formulaire */
        
        $type_id = "SELECT type_id FROM typeofcompany WHERE typeofcompany.type_name = $type_name;";
        $people_firstname = "SELECT people_firstname FROM people WHERE people.people_id = $people_id;";
        $people_lastname = "SELECT people_lastname FROM people WHERE people.people_id = $people_id;";
        $people_phone = "SELECT people_phone FROM people WHERE people.people_id = $people_id;";
        $people_email = "SELECT people_email FROM people WHERE people.people_id = $people_id;";

        $requete = "UPDATE invoice SET invoice_date=$invoice_date, company_id=$company_id, people_id=$people_id WHERE invoice_id=$id;";

        $resultat = $bdd->prepare($requete);
        $resultat->execute();

        return $resultat->fetchAll();
    }

    /* supprimer une facture */
    public function delete(int $id) {
        $bdd = $this->dbConnect();

        $requete = "DELETE FROM invoice WHERE invoice_id=$id;";

        $resultat = $bdd->prepare($requete);
        $resultat->execute();

        return $resultat->fetchAll();
    }
}
