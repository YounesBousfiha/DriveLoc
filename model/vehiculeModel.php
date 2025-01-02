<?php

namespace Model;

use Model\BaseModel;

class vehicule extends BaseModel {

    private $marque;
    private $annee;
    private $disponibilite;
    private $prix;
    private $fk_user_id;
    private $fk_categorie_id;

    public function __construct($marque, $annee, $disponibilite, $prix, $fk_user_id, $fk_categorie_id) {
        $this->marque = $marque;
        $this->annee = $annee;
        $this->disponibilite = $disponibilite;
        $this->prix = $prix;
        $this->fk_user_id = $fk_user_id;
        $this->fk_categorie_id = $fk_categorie_id;
    }
}

?>