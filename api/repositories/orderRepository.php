<?php
require("./../handlers/databaseHandler.php");
//require("./../classes/orderClasses.php");

function saveOrder($order) {
    $db = new Database();

    $orderToAdd = new Order();
    
    $orderToAdd->id = null;
    $orderToAdd->date = $order->date;

      $db->runQuery("INSERT INTO orders (date) VALUES (:date)", $order);
}
?>