<?php
require('./../repositories/AdminRepository.php');
// define('__ROOT__', dirname(dirname(__FILE__))); 
// require_once(__ROOT__.'/repositories/AdminRepository.php'); 

try {
    if(isset($_SERVER["REQUEST_METHOD"])){
        if ($_SERVER['REQUEST_METHOD'] == "GET") {
                $productList  = new Admin();
                $products = $productList->getProductList();
                header('Content-type: application/json');
                header('Access-Control-Allow-Origin: *');
                header('Access-Control-Allow-Headers: Content-Type, X-Requested-With');
                header('Access-Control-Allow-Methods: POST, GET, OPTIONS, DELETE, PUT');
                header('Access-Control-Max-Age: 600');
                echo json_encode($products);
            
        }
           else if ($_SERVER['REQUEST_METHOD'] == "POST") {
            if ($_POST["action"] == "productList") {
                $productList  = new Admin(); 
                $listOfAllProducts = $productList ->productLoaderAdmin();
                header('Content-type: application/json');
                header('Access-Control-Allow-Origin: *');
                header('Access-Control-Allow-Headers: Content-Type, X-Requested-With');
                header('Access-Control-Allow-Methods: POST, GET, OPTIONS, DELETE, PUT');
                header('Access-Control-Max-Age: 600');
           
                echo json_encode($listOfAllProducts);  
            }

            if($_POST["action"] == "addProduct") {
                header('Content-type: application/json');
                header('Access-Control-Allow-Origin: *');
                header('Access-Control-Allow-Headers: Content-Type, X-Requested-With');
                header('Access-Control-Allow-Methods: POST, GET, OPTIONS, DELETE, PUT');
                header('Access-Control-Max-Age: 600');
                $name = $_POST['name'];
                $price = $_POST['price'];
                $category = $_POST['category'];
                $image = $_POST['image'];
                $description = $_POST['description'];
                $unitsInStock = $_POST['unitsInStock'];
                $adminTask = new Admin();
                $adminTask->addProduct($name, $price,$description,$unitsInStock, $image,$category);
                echo json_encode($adminTask);
            }
                if ($_POST["action"] == "remove") { 
                    $productToRemove  = new Admin();
                    $productId= $_POST['productIdToRemove'];
                    $productToRemove->removeProduct($productId);
                    header('Content-type: application/json');
                    header('Access-Control-Allow-Origin: *');
                    header('Access-Control-Allow-Headers: Content-Type, X-Requested-With');
                    header('Access-Control-Allow-Methods: POST, GET, OPTIONS, DELETE, PUT');
                    header('Access-Control-Max-Age: 600');
               
                    echo json_encode($productToRemove);  
        
                }


                if($_POST["action"] == "updateStock") {
                    $id = $_POST["id"];
                    $amount = $_POST["amount"];
                    $stockToUpdate = new Admin();
                    header('Content-type: application/json');
                    header('Access-Control-Allow-Origin: *');
                    header('Access-Control-Allow-Headers: Content-Type, X-Requested-With');
                    header('Access-Control-Allow-Methods: POST, GET, OPTIONS, DELETE, PUT');
                    header('Access-Control-Max-Age: 600');
                    $stockToUpdate->setStock($amount, $id);
                    echo json_encode($stockToUpdate);  
                }
                


                if ($_POST["action"] == "showSubscribers") {
                    $news = new Admin(); 
                    $subscribers = $news->showSubscribers();
                    header('Content-type: application/json');
                    echo json_encode($subscribers);  
                }


                if ($_POST["action"] == "orderList") {
                    $orders = new Admin(); 
                    $orderList = $orders->showOrders();
                    header('Content-type: application/json');
                    header('Access-Control-Allow-Origin: *');
                    header('Access-Control-Allow-Headers: Content-Type, X-Requested-With');
                    header('Access-Control-Allow-Methods: POST, GET, OPTIONS, DELETE, PUT');
                    header('Access-Control-Max-Age: 600');
                    echo json_encode($orderList);  
                }


            } 
           

} 
}
catch(EXCEPTION $e) {
    http_response_code($e->getCode());
    echo json_encode(array("status" => $e->getCode(), "Message" => $e->getMessage()));
}

?>