<?php
require("./../handlers/databaseHandler.php");
//require("./../classes/orderClasses.php");

function saveOrder($order) {
    $db = new Database();

    $orderToAdd = new Order();
    
    $orderToAdd->id = null;
    $orderToAdd->date = $order->date;

    error_log(json_encode($orderToAdd));
 
    $db->runQuery("INSERT INTO orders (date) VALUES (:date);", $order);
   /*
    //orderid från db
    error_log(json_encode($order["cartItems"]));
    foreach ($order["cartItems"] as $cartItem){
        
        //$AddItems = new Order();
        
        $sqlArray = array(
            "productId" => $cartItem["product"]["id"],
            "quantity" => $cartItem["quantity"]
        );
    
        

    $db->runQuery("INSERT INTO test (productId, quantity) VALUES (:productId, :quantity);", $sqlArray);
    };*/
}

function getAllShippers(){

    $db = new Database();

    return $db->fetchQuery("SELECT name FROM shippers", "Shipper");

}

?>