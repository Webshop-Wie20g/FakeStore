<?php

require("./../handlers/databaseHandler.php");

function getAllProducts(){
    $db = new Database();
    return $db->fetchQuery("SELECT * FROM products");
    
    
}








?>