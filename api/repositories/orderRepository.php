<?php

require("./../handlers/databaseHandler.php");

function storeOrder(){

    $db = new Database();
    return $db->fetchQuery("INSERT INTO orders (date) VALUES (:today);");

}