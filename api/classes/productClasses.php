<?php


 
class product {
 
    function __construct() {
        $this->id = intval($this->id);
        $this->price = intval($this->price);
        $this->unitsInStock = intval($this->unitsInStock);
        
    }
    
    public $id;
    public $name;
    public $price;
    public $description;
    public $unitInStock;
 
}








?>