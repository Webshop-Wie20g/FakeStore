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

function getTvCategory(){
    $db = new Database();
    return $db->fetchQuery("SELECT * FROM products p JOIN productcategorydetailes ON p.id = productid WHERE categoryid = 1" , "product");
    
    
}







?>