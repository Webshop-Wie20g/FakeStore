<?php
// require $_SERVER['DOCUMENT_ROOT']. "/handlers/databaseHandler.php";
// include($_SERVER["DOCUMENT_ROOT"] . "handlers/databaseHandler.php");
// require_once __DIR__ .'../../handlers/databaseHandler.php';
// require("../api/handlers/databaseHandler.php");
// define('__ROOT__', dirname(dirname(__FILE__))); 
// require(__ROOT__.'/handlers/db.php'); 
define('__ROOT__', dirname(dirname(__FILE__))); 
require_once(__ROOT__.'/handlers/db.php'); 

// require_once $_SERVER["DOCUMENT_ROOT"]."\handlers\databaseHandler.php";

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

    function adminChecker($username) {
        $sql = "SELECT role FROM users WHERE userName = :username";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(':username', $username);
        $statement->execute();
        $checkAdmin = $statement->fetch(PDO::FETCH_ASSOC);
        if ($checkAdmin["role"] == "1") { 
            return true;
        } else {
            return false;
        }
    }

    function userLogin($username, $password) {
        try {
            $sql = "SELECT userName, Password FROM users WHERE userName = :username";
            $statement = $this->connection->prepare($sql);
            $statement->bindParam(':username', $username);
            $statement->execute();
            $checkPassword = $statement->fetch(PDO::FETCH_ASSOC);
            $warning = '';
            header('Content-type: application/json');
            header('Access-Control-Allow-Origin: *');

            if ($checkPassword) {  
                if (password_verify($_POST["password"], $checkPassword["Password"])) {
                    $_SESSION["user"] = $username;  
                    echo json_encode("LoggedIn");
                    die;
                } else {
                    $warning = json_encode("Password Is Wrong");
                }

            }

            echo $warning;
         
        } catch (EXCEPTION $err) {
            throw $err;
        }
    }
    
}
?>