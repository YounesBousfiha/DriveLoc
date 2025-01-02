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

    public function __construct()
    {
       $this->marque = null;
       $this->annee = null;
       $this->disponibilite = null;
       $this->prix = null;
       $this->fk_user_id = null;
       $this->fk_categorie_id = null;

    }
}

?>