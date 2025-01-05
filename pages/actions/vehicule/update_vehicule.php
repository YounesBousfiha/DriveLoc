<?php

use Younes\DriveLoc\Config\DBConnection;
use Younes\DriveLoc\Controller\AdminController;

require_once __DIR__ . '/../../../vendor/autoload.php';


$db = DBConnection::getConnection()->conn;
$admin = new AdminController($db);

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $vehiculeData = $admin->getVehicule($_GET['id']);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $status = $admin->updateVehicule($_GET['id'], $_POST);

    echo $status;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Vehicule</title>
</head>
<body>
<form action="update_vehicule.php?id=<?php echo $vehiculeData['vehicule_id']; ?>" method="post">
    <label for="vehicule_marque">Marque:</label>
    <input type="text" id="vehicule_marque" name="vehicule_marque" value="<?php echo htmlspecialchars($vehiculeData['vehicule_marque']); ?>"><br>

    <label for="vehicule_modele">Modele:</label>
    <input type="text" id="vehicule_modele" name="vehicule_modele" value="<?php echo htmlspecialchars($vehiculeData['vehicule_modele']); ?>"><br>

    <label for="vehicule_disponibilite">Disponibilite:</label>
    <input type="text" id="vehicule_disponibilite" name="vehicule_disponibilite" value="<?php echo htmlspecialchars($vehiculeData['vehicule_disponibilite']); ?>"><br>

    <label for="vehicule_prix">Prix:</label>
    <input type="text" id="vehicule_prix" name="vehicule_prix" value="<?php echo htmlspecialchars($vehiculeData['vehicule_prix']); ?>"><br>

    <input type="submit" value="Update Vehicule">
</form>
</body>
</html>



