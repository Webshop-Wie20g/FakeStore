<?php

session_start();
require('./../repositories/AdminRepository.php');



try {
    if(isset($_SERVER["REQUEST_METHOD"])){
     if ($_SERVER['REQUEST_METHOD'] == "POST") {

         
        if(empty($_POST['email']) && empty($_POST['password'])) {
            die;
        } else {
            $username = $_POST['username'];
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $user = new Admin();
            header('Content-type: application/json');
            header('Access-Control-Allow-Origin: *');
            header('Access-Control-Allow-Headers: Content-Type, X-Requested-With');
            header('Access-Control-Allow-Methods: POST, GET, OPTIONS, DELETE, PUT');
            header('Access-Control-Max-Age: 600');

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