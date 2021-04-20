<?php

namespace App\Models;

class Fournisseurs extends Manager {

    public function all() {
        $bdd = $this->dbConnect();
        $requete = "SELECT company_name, company_tva, company_country FROM company WHERE `type_id`=2";
        $resultat = $bdd->prepare($requete);
        $resultat->execute();

        return $resultat->fetchAll();
    }
}