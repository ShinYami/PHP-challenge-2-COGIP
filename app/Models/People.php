<?php

namespace App\Models;

use PDO;

class People extends Manager
{

    // renvoie tout les people avec leur company
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

    //last 5
    public function last5()
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

    // trouve un people par son id
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

    // renvoie toutes les factures apparenants a un people par son id
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

    // renvoie toutes les compagny name avec leur id
    public function allCompagnyNameAndId()
    {
        $bdd = $this->dbConnect();

        $requete = "SELECT company_name, company_id FROM company";

        $resultat = $bdd->prepare($requete);
        $resultat->execute();

        return $resultat->fetchAll();
    }

    // creer un people 
    public function createPeople(array $param)
    {
        $bdd = $this->dbConnect();

        $requete = "INSERT INTO `people`( `people_firstname`, `people_lastname`, `people_phone`, `people_email`, `company_id`) VALUES (:NOM,:PRENOM,:PHONE,:EMAIL,:SOCIETE)";

        $resultat = $bdd->prepare($requete);

        $resultat->bindParam(':NOM', $param['nom'], PDO::PARAM_STR);
        $resultat->bindParam(':PRENOM', $param['prenom'], PDO::PARAM_STR);
        $resultat->bindParam(':PHONE', $param['phone'], PDO::PARAM_INT);
        $resultat->bindParam(':EMAIL', $param['email'], PDO::PARAM_STR);
        $resultat->bindParam(':SOCIETE', $param['societe'], PDO::PARAM_INT);
        return $resultat->execute();
    }
}
//INSERT INTO `people`(`people_firstname`, `people_lastname`, `people_phone`, `people_email`, `company_id`) VALUES ([value-2],[value-3],[value-4],[value-5],[value-6])
