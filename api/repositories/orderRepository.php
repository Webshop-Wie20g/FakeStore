<?php
require("./../handlers/databaseHandler.php");
//require("./../classes/orderClasses.php");

function saveOrder($order) {
    $db = new Database();

    return $db->runQuery("INSERT INTO orders (date) VALUES (:date)", $order);
}
?>