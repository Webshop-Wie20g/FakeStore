<?php
// session_start();
//    require_once("../../api/repositories/UserRepository.php");
//    $user = new User();
//    if (isset($_SESSION["user"])) {
//       $username = $_SESSION["user"];
//       if ($user->adminChecker($username) != true) {
//          header("Location: ../index.php");
//          exit();
//       } 

//    } else {
//       echo var_dump($_SESSION);
//       header("Location: ../index.php");
//       exit();
//    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <link rel="stylesheet" type="text/css" href="../style/style.css">
      <script src="../admin.js"></script>
      <title>Admin page</title>
</head>
   <body onload="getAllproductsFromAdmin()">
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


          </div>
          </div>
          </div>
      </div>
    </div>



  </div>

<?php include("footer.php");?>