<?php
session_start();
require("./../repositories/orderRepository.php");

try{
    if(isset($_SERVER["REQUEST_METHOD"])) {
        header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Headers: Content-Type, X-Requested-With');
        header('Access-Control-Allow-Methods: POST, GET, OPTIONS, DELETE, PUT');
        header('Access-Control-Max-Age: 600');
        
        if($_SERVER["REQUEST_METHOD"] == "POST") {        
            if($_POST["action"] == "saveOrder") {
                
                $order = json_decode($_POST["order"], true);

                echo json_encode(saveOrder($order));

                 exit;
            }
        
            
            
        }elseif($_SERVER["REQUEST_METHOD"] == "GET"){
            
            
            echo json_encode(getAllShippers());
           
            exit;

        }

    }else{

    throw new ErrorException("No endpoint found", 404);
    }
} catch(Exception $e){
    http_response_code($e->getCode());
    echo json_encode(array(
        "status" => $e->getCode(),
         "Message" => $e->getMessage()
        )
    );
}
?>