<?php

namespace Younes\DriveLoc\Controller;


class AdminController {
    use VehiculeController, CategorieController;
    use AuthController {
        login as public;
        logout as public;
        isLoggedIn as public;
        validateUser as public;
    }
    use ReservationController {
        approuverReservation as public;
        rejectReservation as public;
    }

    public function __construct($db) {
        $this->setDb($db);
    }
}

?>