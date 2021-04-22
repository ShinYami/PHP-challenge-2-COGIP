<?php

namespace App\Models;

use PDO;

class Invoice extends Manager {

    /* ajouter une nouvelle facture */
    public function create(array $param) {
        $bdd = $this->dbConnect();

        $company_id = "SELECT company_id FROM company WHERE company_name = $company_name;";
        $people_id = "SELECT people_id FROM people WHERE people_firstname = $people_firstname AND people_lastname = $people_lastname AND people_phone = $people_phone AND people_email = $people_email;";
        $request = "INSERT INTO invoice (invoice_number, invoice_date, company_id, people_id) VALUES (:NUMBER, :DATE, $company_id, $people_id);";

        $resultat = $bdd->prepare($requete);
        $resultat->bindParam(':NUMBER', $param['invoice_number'], PDO::PARAM_STR);
        $resultat->bindParam(':DATE', $param['invoice_date'], PDO::PARAM_DATE);

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

        $requete = "SELECT invoice_id, invoice_number, invoice_date, company_name FROM invoice, company WHERE invoice.company_id=company.company_id ORDER BY invoice.invoice_date DESC LIMIT 0,5;";

        $resultat = $bdd->prepare($requete);
        $resultat->execute();

        return $resultat->fetchAll();
    }

    /* afficher les infos société d'une facture */
    public function readOneCompany(int $id) {
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
        public function readOneContact(int $id) {
            $bdd = $this->dbConnect();
    
            $requete = "SELECT p.people_firstname, p.people_lastname, p.people_email, p.people_phone FROM invoice i 
            INNER JOIN people p ON i.people_id = p.people_id
            WHERE i.invoice_id = $id;";
            
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
