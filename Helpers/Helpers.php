<?php

namespace Younes\DriveLoc\Helpers;

class Helpers {
    public static function generateToken() {
        return bin2hex(random_bytes(32));
    }

    public static function redirect($url) {
        return header("Location:" . $url);
    }

    public static function ValidateData($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}
?>