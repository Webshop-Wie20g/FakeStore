<?php

session_start();
require_once('../repositories/UserRepository.php');


try {
    if(isset($_SERVER["REQUEST_METHOD"])){
     if ($_SERVER['REQUEST_METHOD'] == "POST") {
        if(empty($_POST['email']) && empty($_POST['password'])) {
            die;
        } else {
            $username = $_POST['username'];
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $user = new User();

            if($_POST["action"] == "loginUser") {            
                $user->userLogin($username, $password);
            }  
        }

        if ($_POST["action"] == "logout") {
            session_destroy();
            unset($_SESSION["user"]);
            die;
        }
    }
}
} catch(EXCEPTION $err) {
    echo json_encode($err);
}

?>