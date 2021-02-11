<?php

try{
    session_start();

    if(isset($_SERVER["REQUEST_METHOD"])) {
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            
            echo json_encode(true);
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