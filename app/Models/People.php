<?php

namespace App\Models;

use PDO;

class People extends Manager
{


    public function all()
    {
        $bdd = $this->dbConnect();

        $requete = "SELECT p.people_id, p.people_firstname, p.people_lastname, p.people_phone, p.people_email, c.company_name  FROM people p
        INNER JOIN company c
        ON p.company_id = c.company_id
        ";

        $resultat = $bdd->prepare($requete);
        $resultat->execute();

        return $resultat->fetchAll();
    }

    public function findById(int $id)
    {
        $bdd = $this->dbConnect();

        $requete = "SELECT p.people_id, p.people_firstname, p.people_lastname, p.people_phone, p.people_email, c.company_name  FROM people p
        INNER JOIN company c
        ON p.company_id = c.company_id 
        WHERE p.people_id = :id";

        $resultat = $bdd->prepare($requete);
        $resultat->bindParam(':id', $id, PDO::PARAM_INT);
        $resultat->execute();

        return $resultat->fetch();
    }

    public function allInvoiceFindById(int $id)
    {
        $bdd = $this->dbConnect();

        $requete = "SELECT i.invoice_number, i.invoice_date FROM invoice i
        INNER JOIN people p
        ON i.people_id = p.people_id 
        WHERE i.people_id = :id";

        $resultat = $bdd->prepare($requete);
        $resultat->bindParam(':id', $id, PDO::PARAM_INT);
        $resultat->execute();

        return $resultat->fetchAll();
    }
}

// $requete = "SELECT invoice_number, invoice_date, company_name, type_name FROM invoice, company, typeofcompany WHERE invoice.company_id=company.company_id AND company.type_id=typeofcompany.type_id ORDER BY invoice.invoice_date DESC";
