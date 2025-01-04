<?php

use Younes\DriveLoc\Controller\UserController;
use Younes\DriveLoc\Config\DBConnection;

require_once __DIR__ . '/../../../vendor/autoload.php';

$db = DBConnection::getConnection()->conn;

$user = new UserController($db);
$allAvis = $user->getAllAvis();

if($_SERVER['REQUEST_METHOD'] === 'GET') {
    if(isset($_GET['id'])) {
        $avis_id = $_GET['id'];
        $user->deleteAvis($avis_id);
        header('Location: all_avis.php');
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Avis</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Avis</th>
                <th>User ID</th>
                <th>Vehicule ID</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($allAvis as $avis): ?>
                <tr>
                    <td><?= $avis['avis_id'] ?></td>
                    <td><?= $avis['avis_rating'] ?></td>
                    <td><?= $avis['fk_user_id'] ?></td>
                    <td><?= $avis['fk_vehicule_id'] ?></td>
                    <td>
                        <a href="update_avis.php?id=<?= $avis['avis_id'] ?>">Update</a>
                        <a href="delete_avis.php?id=<?= $avis['avis_id'] ?>">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
