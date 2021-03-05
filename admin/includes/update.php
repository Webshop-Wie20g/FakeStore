<?php
session_start();
   require_once("../../api/repositories/UserRepository.php");
   $user = new User();
   if (isset($_SESSION["user"])) {
      $username = $_SESSION["user"];
      if ($user->adminChecker($username) != true) {
         header("Location: ../index.php");
         exit();
      } 

   } else {
      echo var_dump($_SESSION);
      header("Location: ../index.php");
      exit();
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <link rel="stylesheet" type="text/css" href="../style/style.css">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
      <script src="../admin.js"></script>
      <title>Admin page</title>
</head>
   <body onload="getAllproducts()">
   <?php include 'header.php';?>
  <div class="job-profile mb-4">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-4 col-lg-3">
<?php include 'sidebar.php';?>

        </div>
        <div class="col-md-8 col-lg-9">
          <div class="job-profile-details" id="ProductList">
            <h2>Products</h2>
            <select id="id" class=" itemId form-control mb-3"></select>
            <label> Total In Stock:</label>
                     <input class="form-control mb-3" type="number" placeholder="Enter a number" name="newtotal" id="newTotal" maxlength="50"/>

            <button class="btn btn-success" onclick="update()">Update Stock</button>

          </div>
          </div>
          </div>
      </div>
    </div>



  </div>

<?php include("footer.php");?>