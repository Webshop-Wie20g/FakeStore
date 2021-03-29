<?php
require("./../handlers/databaseHandler.php");
//require("./../classes/orderClasses.php");

function saveOrder($order) {
    $db = new Database();

    $orderToAdd = new Order();
    
    $orderToAdd->id = null;
    $orderToAdd->date = $order->date;

    //error_log(json_encode($order));
 
    $db->runQuery("INSERT INTO orders (date) VALUES (:date);", $order);
   
    //orderid från db
    // error_log(json_encode($order["cartItems"]));
    // foreach ($order["cartItems"] as $cartItem){
        
        
    //     $orderDetailes = array(
    //         "productId" => $cartItem["product"]["id"],
    //         "quantity" => $cartItem["quantity"]
                //Lägg till pris
    //     );
    //     error_log(json_encode($orderDetailes));
    
        

    // $db->runQuery("INSERT INTO order_product_detail (productId, quantity) VALUES (:productId, :quantity);", $orderDetailes);
    // };
}

function getAllShippers(){

    $db = new Database();

    return $db->fetchQuery("SELECT name FROM shippers", "Shipper");

}

?>