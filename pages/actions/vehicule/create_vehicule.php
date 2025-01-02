<?php

use Younes\DriveLoc\Config\DBConnection;
use Younes\DriveLoc\Controller\AdminController;

require_once __DIR__ . '/../../../vendor/autoload.php';

if($_SERVER['REQUEST_METHOD'] === 'POST') {

    var_dump($_POST);

    $admin = new AdminController(DBConnection::getConnection()->conn, 'vehicules');

    // TODO : Validation of the data

    $admin->create($_POST);
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST">
        <input type="text" name="vehicule_marque" placeholder="marque">
        <input type="text" name="vehicule_modele" placeholder="modele">
        <input type="number" name="vehicule_annee" placeholder="annee">
        <select name="vehicule_disponibilite">
            <option value="Available">Available</option>
            <option value="NonAvailable">Non Available</option>
        </select>
        <input type="number" name="vehicule_prix" placeholder="prix">
        <input type="number" name="fk_user_id" placeholder="fk_user_id">
        <input type="number" name="fk_categorie_id" placeholder="fk_categorie_id">
        <button type="submit">Submit</button>
    </form>
</body>
</html>