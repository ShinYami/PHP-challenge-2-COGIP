<?php

namespace App\Models;

use PDO;

class Connexion extends Manager {

    public function clients() {
        $bdd = $this->dbConnect();
        $requete = "SELECT company_name, company_tva, company_country FROM company WHERE `type_id`=1";
        $resultat = $bdd->prepare($requete);
        $resultat->execute();

        return $resultat->fetchAll();
    }

    public function fournisseurs() {
        $bdd = $this->dbConnect();
        $requete = "SELECT company_name, company_tva, company_country FROM company WHERE `type_id`=2";
        $resultat = $bdd->prepare($requete);
        $resultat->execute();

        return $resultat->fetchAll();
    }

    public function company_infos() {
        $bdd = $this->dbConnect();
        $requete = "SELECT c.company_name, c.company_tva, t.type_name FROM company c INNER JOIN typeofcompany t ON c.type_id = t.type_id";
        $resultat = $bdd->prepare($requete);
        $resultat->execute();

        return $resultat->fetch();
    }

    public function contact_by_id(int $id) {
        $bdd = $this->dbConnect();
        $requete = "SELECT p.people_firstname, p.people_lastname, p.people_phone, p.people_email, c.company_name FROM people p 
        INNER JOIN company c 
        ON p.company_id = c.company_id
        WHERE c.company_id = :id";
        $resultat = $bdd->prepare($requete);
        $resultat->bindParam(':id', $id, PDO::PARAM_INT);
        $resultat->execute();

        return $resultat->fetch();
    }

    public function invoice_by_id(int $id) {
        $bdd = $this->dbConnect();
        $requete = "SELECT i.invoice_number, i.invoice_date, p.people_email FROM invoice i 
        INNER JOIN people p ON p.people_id = i.people_id
        WHERE i.company_id = :id";
        $resultat = $bdd->prepare($requete);
        $resultat->bindParam(':id', $id, PDO::PARAM_INT);
        $resultat->execute();

        return $resultat->fetch();
    }
}