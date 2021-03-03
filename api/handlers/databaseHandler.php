<?php

require("./../classes/orderClasses.php");

require("./../classes/productClasses.php");

require("./../classes/newsletterClass.php");

require("./../classes/categoryClasses.php");


Class Database {

    function __construct(){

        $dns = "mysql:host=localhost;dbname=store5";
        $user = "root";
        $pass = "root";

        $this->db = new PDO($dns, $user, $pass);
        $this->db->exec("set names utf8");
    }

    public $db;

    private function prepareQuery($query){
        return $this->db->prepare($query);
        
    }

    public function runQuery($query, $class) {
        $preparedQuery = $this->prepareQuery($query);
        $status = $preparedQuery->execute($class);
        return $preparedQuery->errorInfo();
    }

    public function fetchQuery($query, $class){
        $preparedQuery = $this->prepareQuery($query);
        $preparedQuery->execute();
        return $preparedQuery->fetchAll(PDO::FETCH_CLASS, $class);
    }
}
?>