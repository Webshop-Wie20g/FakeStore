<?php
session_start();

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
   <body onload="showNewsLetterSubscribers()">
   <?php include 'header.php';?>
  <div class="job-profile mb-4">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-4 col-lg-3">
<?php include 'sidebar.php';?>

        </div>
        <div class="col-md-8 col-lg-9">
          <div class="job-profile-details" id="ProductList">
            <h2>Subscribers</h2>


          </div>
          </div>
          </div>
      </div>
    </div>



  </div>

<?php include("footer.php");?>