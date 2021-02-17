<?php

try{
    session_start();
    require('./../repositories/orderRepository.php');
    if(isset($_SERVER["REQUEST_METHOD"])) {
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            
            if($_POST['action'] == 'saveOrder'){

                $order = json_decode($_POST['today'], true);
                json_encode(saveOrder($order)); 
 
                exit;
            }
        }else{
            throw new ErrorException("Wrong reqest method used", 405);
        }

    }else{

    throw new ErrorException("No endpoint found", 404);
    }
} catch(Exception $e){
    http_response_code($e->getCode());
    echo json_encode(array("status" => $e->getCode(), "Message" => $e->getMessage()));
} 