<?php

namespace App\Models;

use PDO;

class Invoice extends Manager
{

    /* créer une nouvelle facture */
    public function create(array $param)
    {
        $bdd = $this->dbConnect();

        $request = "INSERT INTO invoice (invoice_number, invoice_date, company_id, people_id) VALUES (:NUMBER, :DATE, :ComID, :peoID);";
        $resultat = $bdd->prepare($request);
        $resultat->bindParam(':NUMBER', $param['invoice_number'], PDO::PARAM_STR);
        $resultat->bindParam(':DATE', $param['invoice_date']);
        $resultat->bindParam(':ComID', $param['company_id']);
        $resultat->bindParam(':peoID', $param['people_id']);

        return $resultat->execute();
    }

    /* page des factures */
    public function readAll()
    {
        $bdd = $this->dbConnect();

        $requete = "SELECT invoice_id, invoice_number, invoice_date, company_name, type_name FROM invoice, company, typeofcompany WHERE invoice.company_id=company.company_id AND company.type_id=typeofcompany.type_id ORDER BY invoice.invoice_date DESC";

        $resultat = $bdd->prepare($requete);
        $resultat->execute();

        return $resultat->fetchAll();
    }

    // renvoie toutes les invoice_number avec leur id
    public function invoicesNumberId(int $id)
    {
        $bdd = $this->dbConnect();

        $requete = "SELECT invoice_number, invoice_id FROM invoice WHERE invoice_id=$id";

        $resultat = $bdd->prepare($requete);
        $resultat->execute();

        return $resultat->fetchAll();
    }

    /* afficher les 5 dernières factures */
    public function readFiveLast()
    {
        $bdd = $this->dbConnect();

        $requete = "SELECT invoice_id, invoice_number, invoice_date, company_name FROM invoice, company WHERE invoice.company_id=company.company_id ORDER BY invoice.invoice_date DESC LIMIT 0,5;";

        $resultat = $bdd->prepare($requete);
        $resultat->execute();

        return $resultat->fetchAll();
    }

    /* afficher les infos société d'une facture */
    public function readOneCompany(int $id)
    {
        $bdd = $this->dbConnect();

        $requete = "SELECT i.invoice_number, c.company_name, c.company_tva, t.type_name FROM invoice i
        INNER JOIN company c ON i.company_id = c.company_id
        INNER JOIN typeofcompany t ON c.type_id = t.type_id
        WHERE i.invoice_id=$id;";

        $resultat = $bdd->prepare($requete);
        $resultat->execute();

        return $resultat->fetchAll();
    }

    /* afficher les infos contact d'une facture */
    public function readOneContact(int $id)
    {
        $bdd = $this->dbConnect();

        $requete = "SELECT p.people_firstname, p.people_lastname, p.people_email, p.people_phone FROM invoice i 
            INNER JOIN people p ON i.people_id = p.people_id
            WHERE i.invoice_id = $id;";

        $resultat = $bdd->prepare($requete);
        $resultat->execute();

        return $resultat->fetchAll();
    }

    // recupère toutes les sociétés de la DB
    public function readAllCompany()
    {
        $bdd = $this->dbConnect();

        $requete = "SELECT company_id, company_name FROM company;";

        $resultat = $bdd->prepare($requete);
        $resultat->execute();

        return $resultat->fetchAll();
    }

    // récupère tous les contacts d'une société en particulier
    public function readAllPeople()
    {
        $bdd = $this->dbConnect();

        $requete = "SELECT people_id,people_firstname, people_lastname FROM people p;";

        $resultat = $bdd->prepare($requete);
        $resultat->execute();

        return $resultat->fetchAll();
    }

    /* supprimer une facture */
    public function deleteInvoice(int $id) {
        $bdd = $this->dbConnect();

        $requete = "DELETE FROM invoice WHERE invoice_id=$id;";

        $resultat = $bdd->prepare($requete);
        $resultat->bindParam(':id', $id, PDO::PARAM_INT);
        $resultat->execute();
    }
}
