<?php

use Younes\DriveLoc\Controller\UserController;
use Younes\DriveLoc\Config\DBConnection;

require_once __DIR__ . '/../../../vendor/autoload.php';

$db = DBConnection::getConnection()->conn;

$user = new UserController($db);
$allAvis = $user->getAllAvis();

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(isset($_POST['id']) && isset($_POST['avis_rating'])) {
        $avis_id = $_POST['id'];
        $avis_rating = $_POST['avis_rating'];
        $user->updateAvis($avis_id, $avis_rating);
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
    <title>Update Avis</title>
</head>
<body>
    <h1>Update Avis</h1>
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
    <form action="update_avis.php" method="POST">
        <label for="id">ID</label>
        <input type="text" name="id" id="id">
        <label for="avis_rating">Avis</label>
        <input type="text" name="avis_rating" id="avis_rating">
        <button type="submit">Update Avis</button>
    </form>
</body>
</html>


