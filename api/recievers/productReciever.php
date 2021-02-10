<?php

try{
    if(isset($_SERVER["REQUEST_METHOD"])){

        if($_SERVER["REQUEST_METHOD"] == "GET"){
            
            echo("hej hej");

        }else{

            throw new Exception("Wrong Method", 500);
        }


    }else{
        
        throw new Exception("No request method set", 500);
    }

}catch(Exception $error) {
    echo json_encode(
        array(
            "Message" => $error -> getMessage(),
            "Status" => $error -> getCode() 

        )
    );

}

















?>