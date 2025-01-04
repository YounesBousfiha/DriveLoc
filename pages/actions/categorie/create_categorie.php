<?php

// TODO: Created_BY Field into the categories Table Extracted using ValidateUser()
use Younes\DriveLoc\Controller\AdminController;
use Younes\DriveLoc\Config\DBConnection;
use Younes\DriveLoc\Model\Categorie;


require_once __DIR__ . '/../../../vendor/autoload.php';
$db = DBConnection::getConnection()->conn;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {



        $admin = new AdminController($db);
        $categorie = new Categorie($_POST);

        $status = $admin->createCategorie((array) $categorie);

        echo $status;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Category</title>
</head>
<body>
    <form method="POST">
        <input type="text" name="categorie_nom" placeholder="nom">
        <button type="submit">Submit</button>
    </form>
</body>
</html>