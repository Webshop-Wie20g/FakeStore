<?php

class Order {

    function __construct() {
        $this->id = intval($this->id);
        $this->date = strval($this->date);
    }

    
    public $id;
    public $date;
    public $productId;
    public $quantity;

}


class OrderItem{

    function __construct() {
        $this->productId = intval($this->productId);
        $this->quantity = intval($this->quantity);
    }
    public $productId;
    public $quantity;

}



class Shipper {

    function __construct() {
        $this->price = intval($this->price);

    }

    public $name;
}

