<?php

require_once __DIR__ .'../../handlers/databaseHandler.php';
class User {
    private $connection;
    private $database;

    function __construct() {
        $this->database = new Database();
        $this->connection = $this->database->connect();
        
    }


    function userLogin($username, $password) {
        try {
            $sql = "SELECT userName, Password FROM users WHERE userName = :username";
            $statement = $this->connection->prepare($sql);
            $statement->bindParam(':username', $username);
            $statement->execute();
            $checkPassword = $statement->fetch(PDO::FETCH_ASSOC);
            $warning = '';
            header('Content-type: application/json');
            header('Access-Control-Allow-Origin: *');

            if ($checkPassword) {  
                if (password_verify($_POST["password"], $checkPassword["Password"])) {
                    $_SESSION["user"] = $username;  
                    echo json_encode("LoggedIn");
                    die;
                } else {
                    $warning = json_encode("Password Is Wrong");
                }

            }

            echo $warning;
         
        } catch (EXCEPTION $err) {
            throw $err;
        }
    }




    function adminChecker($username) {
        $sql = "SELECT role FROM users WHERE userName = :username";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(':username', $username);
        $statement->execute();
        $checkAdmin = $statement->fetch(PDO::FETCH_ASSOC);
        if ($checkAdmin["role"] == "1") { 
            return true;
        } else {
            return false;
        }
    }
}
