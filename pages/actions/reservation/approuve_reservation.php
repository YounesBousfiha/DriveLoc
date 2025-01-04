<?php

use Younes\DriveLoc\Controller\AdminController;
use Younes\DriveLoc\Config\DBConnection;

require_once __DIR__ . '/../../../vendor/autoload.php';

$db = DBConnection::getConnection()->conn;

$admin = new AdminController($db);

$allReservations = $admin->getAllReservations();

if($_SERVER['REQUEST_METHOD'] === 'GET') {
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $admin->approuverReservation($id);
        header('Location: all_reservations.php');
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Reservations</title>
</head>
<body>
<h1>All Reservations</h1>
<table border="1">
    <thead>
    <tr>
        <th>Reservation ID</th>
        <th>Reservation Date</th>
        <th>Reservation Lieux</th>
        <th>User ID</th>
        <th>Vehicle ID</th>
        <th>Reservation Status</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($allReservations as $reservation): ?>
        <tr>
            <td><?= $reservation['reservation_id'] ?></td>
            <td><?= $reservation['reservation_date'] ?></td>
            <td><?= $reservation['reservation_lieux'] ?></td>
            <td><?= $reservation['fk_user_id'] ?></td>
            <td><?= $reservation['fk_vehicule_id'] ?></td>
            <td><?= $reservation['reservation_status'] ?></td>
            <td>
                <?php if($reservation['reservation_status'] === 'Pending'): ?>
                    <a href="approuve_reservation.php?id=<?= $reservation['reservation_id'] ?>">Approuver</a>
                    <a href="reject_reservation.php?id=<?= $reservation['reservation_id'] ?>">Reject</a>
                <?php endif; ?>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>


