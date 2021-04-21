<?php

namespace App\Models;

class Clients extends Manager {

    public function all() {
        $bdd = $this->dbConnect();
        $requete = "SELECT company_name, company_tva, company_country, `type_id` FROM company WHERE `type_id`=1";
        $resultat = $bdd->prepare($requete);
        $resultat->execute();

        return $resultat->fetchAll();
    }
}