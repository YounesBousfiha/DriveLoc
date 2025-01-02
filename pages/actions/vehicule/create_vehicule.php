<?php

use Config\DBConnection;
use Controller\AdminController;
use Model\Vehicule;

require_once __DIR__ . '/../../../vendor/autoload.php';

//echo __DIR__ . '../model/Vehicule.php';

if (class_exists('Vehicule')) {
    echo "The class Model\\vehicule exists.\n";
} else {
    echo "The class Model\\vehicule does not exist.";
}

/*if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $marque = $_POST['marque'];
    $annee = $_POST['annee'];
    $disponibilite = $_POST['disponibilite'];
    $prix = $_POST['prix'];
    $fk_user_id = $_POST['fk_user_id'];
    $fk_categorie_id = $_POST['fk_categorie_id'];

    $vehicule = new Vehicule($marque, $annee, $disponibilite, $prix, $fk_user_id, $fk_categorie_id);


    var_dump($vehicule);
}*/
//$adminController = new AdminController(Config\DBConnection::getConnection(), 'vehicule');
//$adminController->create($vehicule);


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
        <input type="text" name="marque" placeholder="marque">
        <input type="text" name="annee" placeholder="annee">
        <input type="text" name="disponibilite" placeholder="disponibilite">
        <input type="text" name="prix" placeholder="prix">
        <input type="text" name="fk_user_id" placeholder="fk_user_id">
        <input type="text" name="fk_categorie_id" placeholder="fk_categorie_id">
        <button type="submit">Submit</button>
    </form>
</body>
</html>