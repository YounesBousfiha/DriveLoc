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

    public function signup($newuserInstance) {
        $isExist = $this->isExist($newuserInstance->__get('email'));
        if(!$isExist) {
            $sql = "INSERT INTO Users (nom, prenom, email, password, fk_role_id) VALUES (:nom, :prenom, :email, :password, :fk_role_id)";
            $hashed_password = password_hash($newuserInstance->__get('password'), PASSWORD_DEFAULT);
            try {
                $stm = $this->db->prepare($sql);
                $stm->bindValue(':Nom', $newuserInstance->__get('nom'));
                $stm->bindValue(':Prenom', $newuserInstance->__get('prenom'));
                $stm->bindValue(':Email', $newuserInstance->__get('email'));
                $stm->bindValue(':Password', $hashed_password);
                $stm->bindValue(':Id_role', $newuserInstance->__get('role'));
                if($stm->execute()) {
                    header("Location: LOGIN_PAGE"); 
                    return true;
                }
            } catch (Exception $e) {
                return "Error: " . $e->getMessage();
            }
        } else {
            return "Email Already Used, Choose Another Address Email.";
        }
    }

    public function login() {}

    public function validateUser() {}
    public function isLoggedIn() {}
    public function logout() {}
}

?>