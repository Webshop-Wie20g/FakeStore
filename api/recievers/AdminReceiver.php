<?php
require_once('../repositories/AdminRepository.php');

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
                    $name = $_POST['name'];
                    $price = $_POST['price'];
                    $category = $_POST['category'];
                    $image = $_POST['image'];
                    $description = $_POST['description'];
                    $unitsInStock = $_POST['unitsInStock'];
                    $adminTask = new Admin();
                    $adminTask->addProduct($name, $price,$description,$unitsInStock, $image,$category);
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
                


            } 
           

} 
}
catch(EXCEPTION $e) {
    http_response_code($e->getCode());
    echo json_encode(array("status" => $e->getCode(), "Message" => $e->getMessage()));
}

?>