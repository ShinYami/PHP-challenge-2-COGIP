<?php

namespace App\Models;
use PDO;

class Invoice extends Manager {

    /* ajouter une nouvelle facture */
    public function create() {
        $bdd = $this->dbConnect();

        $company_id = "SELECT company_id FROM company WHERE company_name = $company_name;";
        $people_id = "SELECT people_id FROM people WHERE people_firstname = $people_firstname AND people_lastname = $people_lastname AND people_phone = $people_phone AND people_email = $people_email;";
        /*$request = "INSERT INTO invoice (invoice_number, invoice_date, company_id, people_id) VALUES ($invoice_number, $invoice_date, $company_id, $people_id);";*/
        $request = "INSERT INTO invoice (invoice_number, invoice_date, company_id, people_id) VALUES (:NUMBER, :DATE, $company_id, $people_id);";

        $resultat = $bdd->prepare($requete);
        $resultat->bindParam(':NUMBER', $param['invoice_number'], PDO::PARAM_STR);
        $resultat->bindParam(':DATE', $param['invoice_date'], PDO::PARAM_DATE);
        $resultat->bindParam(':COMPANYID', $param['invoice_number'], PDO::PARAM_STR);
        $resultat->bindParam(':PEOPLEID', $param['invoice_number'], PDO::PARAM_STR);

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
    public function invoicesNumberId()
    {
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
    public function readOne() {
        $bdd = $this->dbConnect();

        $invoice_id = $_POST['invoice_id'];

        $requete = "SELECT invoice_number, invoice_date company_name, company_tva, type_name, people_firstname, people_lastname, people_email, people_phone FROM invoice, company, typeofcompany, people WHERE invoice.company_id=company.company_id AND company.type_id=typeofcomapny.type_id AND invoice.people_id=people.people_id AND invoice.invoice_id=$invoice_id";

        $resultat = $bdd->prepare($requete);
        $resultat->execute();

        return $resultat->fetchAll();
        }
    
    /* modifier une facture */
    public function update() {
        $bdd = $this->dbConnect();

        $invoice_date = $_POST['invoice_date'];
        $company_name = $_POST['company_name'];
        $type_name = $_POST['type_name'];
        $people_firstname = $_POST['people_firstname'];
        $people_lastname = $_POST['people_lastname'];
        $people_phone = $_POST['people_phone'];
        $people_email = $_POST['people_email'];
        $invoice_id = $_POST['invoice_id'];

        $requete = "UPDATE invoice, company, typeofcompany, people SET invoice.invoice_date=$invoice_date, company.company_name=$company_name, typeofcompany.type_name=$type_name, people.people_firstname=$people_firstname, people.people_lastname=$people_lastname, people.people_phone=$people_phone, people.people_email=$people_email WHERE invoice.invoice_id=$invoice_id;";

        $resultat = $bdd->prepare($requete);
        $resultat->execute();

        return $resultat->fetchAll();
    }

    /* supprimer une facture */
    public function delete() {
        $bdd = $this->dbConnect();

        $invoice_id = $_POST['invoice_id'];

        $requete = "DELETE FROM invoice WHERE invoice_id=$invoice_id;";

        $resultat = $bdd->prepare($requete);
        $resultat->execute();

        return $resultat->fetchAll();
    }


}
