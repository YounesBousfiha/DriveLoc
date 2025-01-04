<?php

use Younes\DriveLoc\Controller\UserController;
use Younes\DriveLoc\Model\Reservation;
use Younes\DriveLoc\Config\DBConnection;

require_once __DIR__ . '/../../../vendor/autoload.php';

$db = DBConnection::getConnection()->conn;

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $date = $_POST['reservation_date'];
    $lieux = $_POST['reservation_lieux'];
    $vehicule_id = $_POST['fk_vehicule_id'];
    $fk_user_id = $_POST['fk_user_id'];

    var_dump($_POST);

    $reservation = new UserController($db);
    $reservationData = new Reservation($date, $lieux, $fk_user_id, $vehicule_id);

    $reservation->setDb($db);
    $status = $reservation->createReservation($reservationData);

    echo $status;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Make a Reservation</title>
</head>
<body>
<h1>Make a Reservation</h1>
<form action="fait_reservation.php" method="POST">

    <label for="reservation_date">Reservation Date:</label>
    <input type="date" id="reservation_date" name="reservation_date" required><br><br>

    <label for="reservation_lieux">Reservation Lieux:</label>
    <input type="text" id="reservation_lieux" name="reservation_lieux" required><br><br>

    <label for="fk_vehicule_id">Vehicle ID:</label>
    <input type="text" id="fk_vehicule_id" name="fk_vehicule_id" required><br><br>

    <label for="fk_user_id">User ID:</label>
    <input type="text" id="fk_user_id" name="fk_user_id" required><br><br>

    <input type="submit" value="Submit">
</form>
</body>
</html>
