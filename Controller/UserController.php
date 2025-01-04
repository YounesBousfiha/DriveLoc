<?php

namespace Younes\DriveLoc\Controller;


class UserController {
    use AuthController;
    use ReservationController {
        createReservation as public;
    }
}

?>