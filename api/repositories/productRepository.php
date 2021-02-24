<?php

require("./../handlers/databaseHandler.php");

function getAllProducts(){
    $db = new Database();
    return $db->fetchQuery("SELECT * FROM products", "product");
    
    
}

function getAllcategories(){
    $db = new Database();
    return $db->fetchQuery("SELECT * FROM categories", "category");
    
    
}








?>