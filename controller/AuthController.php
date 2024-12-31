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

    public function signup($newuserInstance)
    {
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

    public function login($email, $password)
    {
        $isExist = $this->isExist($email);
        if ($isExist) {
            $sql = "SELECT * FROM Users WHERE Email = :Email";

            try {
                $stm = $this->db->prepare($sql);
                $stm->bindValue(':Email', $email);
                if ($stm->execute()) {
                    $data = $stm->fetch(PDO::FETCH_ASSOC);
                    if (password_verify($password, $data['Password'])) {
                        $token = Helpers::generateToken();
                        setcookie("auth_token", $token, time() + 3600, '/');
                        $sql = "UPDATE Users SET Token = :Token WHERE Email = :Email";
                        $stm = $this->db->prepare($sql);
                        $stm->bindValue(':Token', $token);
                        $stm->bindValue(':Email', $email);
                        $stm->execute();
                        if ($data['Id_role'] == 1) {
                            header("Location: ../dashboard.php");
                        } else {
                            header("Location: ../home.php");
                        }
                    }
                }
            } catch (Exception $e) {
                echo "Error : " . $e->getMessage();
            }
        } else {
            return "Email or Password are incorrect";
        }
    }

    public function validateUser() {
        $token = $_COOKIE['auth_token'];
        if($token) {

            $sql = "SELECT * FROM users WHERE token = :token";
            try {
                $stm = $this->db->prepare($sql);
                $stm->bind_param(':token', $token);
                if($stm->execute()) {
                    $user = $stm->fetch();
                    return $user;
                } else {
                    return null;
                }
            } catch (Exception $e)
            {
                echo "Error: " . $e->getMessage();
            }
        } else {
            echo "Your are not Authenticated !";
        }
    }

    public function isLoggedIn() {
        $token = $_COOKIE['auth_token'];
        if($token) {
            return true;
        } else {
            return false;
        }
    }
    public function logout() {}
}

?>