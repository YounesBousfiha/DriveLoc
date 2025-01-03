<?php

use Younes\DriveLoc\Controller\AdminController;
use Younes\DriveLoc\Config\DBConnection;


require_once __DIR__ . '/../../../vendor/autoload.php';

$db = DBConnection::getConnection()->conn;

$admin = new AdminController($db);

$categorieData = $admin->getCategorie($_GET['id']);


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $status = $admin->deleteCategorie($_POST['id']);

    echo $status;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Delete Categorie</title>
</head>
<body>
<form action="delete_categorie.php?id=<?php echo $categorieData['categorie_id']; ?>" method="post">
    <input type="hidden" name="id" value="<?php echo $categorieData['categorie_id']; ?>">
    <input type="submit" value="Delete Categorie">
</form>
</body>
</html>
