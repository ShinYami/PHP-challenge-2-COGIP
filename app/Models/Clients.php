<?php

namespace App\Models;

use PDO;

class Clients extends Manager {

    public function all() {
        $bdd = $this->dbConnect();
        $requete = "SELECT company_name, company_tva, company_country FROM company WHERE `type_id`=1";
        $resultat = $bdd->prepare($requete);
        $resultat->execute();

        return $resultat->fetchAll();
    }

    public function find_by_id(int $id) {
        $bdd = $this->dbConnect();
        $requete = "SELECT company_name, company_tva, `type_name`, people_firstname, people_lastname, people_phone, people_email, invoice_number, invoice_date, people_email FROM company, typeofcompany, people, invoice WHERE company.type_id=typeofcompany.type_id AND company.company_id=people.company_id AND company.company_id=invoice.company_id AND invoice.people_id=people.people_id AND invoice.people_id=people.people_id AND company.company_id=:id";
        $resultat = $bdd->prepare($requete);
        $resultat->bindParam(':id', $id, PDO::PARAM_INT);
        $resultat->execute();

        return $resultat->fetch();
    }
}