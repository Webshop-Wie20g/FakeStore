<?php

class Order {

    function __construct() {
        $this->id = intval($this->id);

    }

    
    public $id;
    public $date;

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


    }

    public $name;
}

