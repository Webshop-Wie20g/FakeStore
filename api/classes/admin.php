<?php
require_once('../handlers/databaseHandler.php');

class Admin{
    
    function __construct() {
        $this->id = intval($this->id);
        $this->price = intval($this->price);
        $this->unitsInStock = intval($this->unitsInStock);
        
    }
    
    public $id;
    public $name;
    public $price;
    public $description;
    public $unitsInStock;
    private $admin;
    
 
}