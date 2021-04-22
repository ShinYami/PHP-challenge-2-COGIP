<?php

namespace App\Models;

use PDO;

class Connexion extends Manager
{
    public function clients()
    {
        $bdd = $this->dbConnect();
        $requete = "SELECT company_id, company_name, company_tva, company_country FROM company WHERE `type_id`=1";
        $resultat = $bdd->prepare($requete);
        $resultat->execute();
        return $resultat->fetchAll();
    }

    public function fournisseurs()
    {
        $bdd = $this->dbConnect();
        $requete = "SELECT company_id, company_name, company_tva, company_country FROM company WHERE `type_id`=2";
        $resultat = $bdd->prepare($requete);
        $resultat->execute();
        return $resultat->fetchAll();
    }

    public function company_infos(int $id)
    {
        $bdd = $this->dbConnect();
        $requete = "SELECT c.company_id, c.company_name, c.company_tva, t.type_name FROM company c 
        INNER JOIN typeofcompany t 
        ON c.type_id = t.type_id
        WHERE c.company_id = :id";
        $resultat = $bdd->prepare($requete);
        $resultat->bindParam(':id', $id, PDO::PARAM_INT);
        $resultat->execute();
        return $resultat->fetch();
    }

    public function contact_by_id(int $id)
    {
        $bdd = $this->dbConnect();
        $requete = "SELECT p.people_firstname, p.people_lastname, p.people_phone, p.people_email, c.company_name FROM people p 
        INNER JOIN company c 
        ON p.company_id = c.company_id
        WHERE c.company_id = :id";
        $resultat = $bdd->prepare($requete);
        $resultat->bindParam(':id', $id, PDO::PARAM_INT);
        $resultat->execute();
        return $resultat->fetchAll();
    }

    public function invoice_by_id(int $id)
    {
        $bdd = $this->dbConnect();
        $requete = "SELECT i.invoice_number, i.invoice_date, p.people_email FROM invoice i 
        INNER JOIN people p 
        ON p.people_id = i.people_id
        WHERE i.company_id = :id";
        $resultat = $bdd->prepare($requete);
        $resultat->bindParam(':id', $id, PDO::PARAM_INT);
        $resultat->execute();
        return $resultat->fetchAll();
    }

    // public function delete_infos_company($id) {
    //     $bdd = $this->dbConnect();
    //     $requete = "DELETE FROM company WHERE company_id = :id";
    //     $resultat = $bdd->prepare($requete);
    //     $resultat->bindParam(':id', $id, PDO::PARAM_INT);
    //     $resultat->execute();
    //     return $resultat->fetch();
    // }

    public function create_infos_company(array $data)
    {
        $bdd = $this->dbConnect();
        $requete = "INSERT INTO `company`( `company_name`, `company_country`, `company_tva`, `type_id`) VALUES (:NOM,:PAYS,:TVA,:TYPEID)";
        $resultat = $bdd->prepare($requete);
        $resultat->bindParam(':NOM', $data['nom'], PDO::PARAM_STR);
        $resultat->bindParam(':PAYS', $data['pays'], PDO::PARAM_STR);
        $resultat->bindParam(':TVA', $data['tva'], PDO::PARAM_STR);
        $resultat->bindParam(':TYPEID', $data['typeid'], PDO::PARAM_INT);
        return $resultat->execute();
    }
}
