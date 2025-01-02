<?php

use Younes\DriveLoc\Config\DBConnection;
use Younes\DriveLoc\Controller\AdminController;

require_once __DIR__ . '/../../../vendor/autoload.php';


$admin = new AdminController(DBConnection::getConnection()->conn, 'vehicules');

$data = $admin->all();

if($_SERVER['REQUEST_METHOD'] === 'POST') {

    var_dump($admin->delete($_POST['vehicule_id']));
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

</body>
<table border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data as $row): ?>
            <tr>
                <td><?php echo htmlspecialchars($row['vehicule_id']); ?></td>
                <td><?php echo htmlspecialchars($row['vehicule_marque']); ?></td>
                <td>
                    <form method="POST" action="">
                        <input type="hidden" name="vehicule_id" value="<?php echo $row['vehicule_id']; ?>">
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</html>