<?php

class Auth {
    private $db = null;

    public function __construct($db){
        $this->db = $db; 
    }

    public function isExist($email)
    {
        $isFound = false;
        $sql = "SELECT * FROM users WHERE email = :email";
        try {
            $stm = $this->db->prepare($sql);
            $stm->bindValue(':email', $email);
            if ($stm->execute()) {
                if ($stm->rowCount() > 0) {
                    $isFound = true;
                }
            }
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
        return $isFound;
    }

    public function login() {}
    public function signup() {}
    public function validateUser() {}
    public function logout() {}
}

?>