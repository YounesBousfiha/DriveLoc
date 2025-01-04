<?php

namespace Younes\DriveLoc\Controller;


class UserController {
    use AuthController, AvisController;
    use ReservationController {
        createReservation as public;
    }
    public function __construct($db) {
        $this->setDb($db);
    }
}