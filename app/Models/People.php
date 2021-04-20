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
    public function createPeople()
    {
    }
    public function createUser(array $param)
    {
        $sql = "INSERT INTO `tbl_client`( `NOM_PRENOM`, `ADRESSE`, `ID_VILLE`, `EMAIL`, `PASSWORD`, `OPTIN`) VALUES (:NOM_PRENOM,:ADRESSE,:ID_VILLE,:EMAIL,:PASSWORD,NOW()) ";
        $stmt = $this->db->getPDO()->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_CLASS, get_class($this), [$this->db]);
        $stmt->bindParam(':NOM_PRENOM', $param['name'], PDO::PARAM_STR);
        $stmt->bindParam(':ADRESSE', $param['adress'], PDO::PARAM_STR);
        $stmt->bindParam(':ID_VILLE', $param['locality'], PDO::PARAM_INT);
        $stmt->bindParam(':EMAIL', $param['email'], PDO::PARAM_STR);
        $stmt->bindParam(':PASSWORD', $param['password'], PDO::PARAM_STR);
        return $stmt->execute();
    }
}
