<?php

namespace Younes\DriveLoc\Controller;


class AdminController {

    use VehiculeController;

    public function __construct($db) {
        $this->setDb($db);
    }
}

?>