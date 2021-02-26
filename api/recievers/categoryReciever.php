<?php

try{
    if(isset($_SERVER["REQUEST_METHOD"])){

        require("./../repositories/productRepository.php");

        if($_SERVER["REQUEST_METHOD"] == "GET"){
            if($_GET["action"]== "getTvCategory"){
                echo json_encode(getTvCategory());
                exit;
                
            }
            echo json_encode(getAllcategories());
            exit;

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