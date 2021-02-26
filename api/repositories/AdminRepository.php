<?php
require_once('../../admin/db.php');

class Admin{
    private $connection;
    private $database;

    function __construct(){
        $this->database = new Database();
        $this->connection = $this->database->connect();
    }

    

    function productLoaderAdmin() {
        $sql = "SELECT id, name, price, unitsInStock FROM products ";
        $statement = $this->connection->prepare($sql);
        $statement->execute();
        $res = $statement->fetchAll();
        
        return $res;
    }


    function addProduct($name, $price, $description, $unitsInStock, $image,$category) {
        try {
            $sql = "SELECT COUNT(name) AS num FROM products WHERE name = :name";
            $statement = $this->connection->prepare($sql);
            $statement->bindParam(':name', $name);
            $statement->execute();

            $producetExist = $statement->fetch(PDO::FETCH_ASSOC);
            if($producetExist['num'] > 0) {
                $response_array['status'] = 'error'; 
                 
                header('Content-type: application/json');
                echo json_encode($response_array);
            }else{
                $statement = $this->connection->prepare("INSERT INTO products (name, price, description, unitsInStock,image,category ) VALUES (:name, :price, :description, :unitsInStock, :image, :category)");
                $statement->bindParam(':name', $name);
                $statement->bindParam(':price', $price);
                $statement->bindParam(':description', $description);
                $statement->bindParam(':unitsInStock', $unitsInStock);
                $statement->bindParam(':image', $image);
                $statement->bindParam(':category', $category);
                
                $statement->execute();
            }
            
        } catch (EXCEPTION $err) {
            throw new Exception($err);
        }

    }
        function getProductList() {
            $sql = "SELECT id, name FROM products ";
            $statement = $this->connection->prepare($sql);
            $statement->execute();
            $res = $statement->fetchAll();
            
            return $res;
        }


        function removeProduct($removeProductID){
        $sql = "DELETE FROM products WHERE id = :id";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(':id', $removeProductID);
        $statement->execute();
        

    }



    function setStock($amount,$ProductID) {

        $sql = "UPDATE products SET unitsInStock = :amount WHERE id = :id";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(":amount", $amount);
        $statement->bindParam(":id", $ProductID);
        $statement->execute();

    }




    function showSubscribers() {
        $sql = "SELECT id,email, userName FROM users WHERE subscriber = 1";
        $statement = $this->connection->prepare($sql);
        $statement->execute();
        $res = $statement->fetchAll();
        return $res;
    }


    function showOrders() {
        $sql = "SELECT * FROM orders";
        $statement = $this->connection->prepare($sql);
        $statement->execute();
        $res = $statement->fetchAll();
        return $res;
    }

    
}
?>