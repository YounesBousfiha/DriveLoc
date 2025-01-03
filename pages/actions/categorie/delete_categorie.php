<?php

use Younes\DriveLoc\Controller\AdminController;
use Younes\DriveLoc\Config\DBConnection;


require_once __DIR__ . '/../../../vendor/autoload.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $db = DBConnection::getConnection()->conn;

    $admin = new AdminController($db);
    $status = $admin->deleteCategorie($_POST['id']);

    echo $status;
}