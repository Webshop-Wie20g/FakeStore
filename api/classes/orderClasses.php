<?php

class Order {

    function __construct() {
        $this->id = intval($this->id);
        $this->date = intval($this->date);
    }

    public $id;
    public $date;

}