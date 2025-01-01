<?php

namespace Helpers;

class Helpers {
    public static function generateToken() {
        return bin2hex(random_bytes(32));
    }

    public static function redirect($url) {
        return header("Location:" . $url);
    }
}
?>