<?php
session_start();
// include($_SERVER["DOCUMENT_ROOT"] . "/api/repositories/AdminRepository.php");
require_once("../api/repositories/AdminRepository.php");
$user = new Admin();
if (isset($_SESSION["user"])) {
  $username = $_SESSION["user"];
  
  if ($user->adminChecker($username) == true) {
    header("Location: admin.php");
    exit();
  }
}

?> 


<!DOCTYPE html>
<html lang="en">


<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login to Admin control panel</title>
  <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="style/style.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" integrity="sha384-vSIIfh2YWi9wW0r9iZe7RJPrKwp6bG+s9QZMoITbCckVJqGCCRhc+ccxNcdpHuYu" crossorigin="anonymous">
</head>

<body>

  <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
    <div class="container">
      <div class="card login-card">
        <div class="row no-gutters">
          <div class="col-md-5">

          </div>
          <div class="col-md-7">
            <div class="card-body">
              <div class="brand-wrapper">
                <i class="fas fa-user-lock fa-5x"></i>
              </div>
              <p class="login-card-description">Admin login</p>
              <form action="#!">


                <div class="form-group">
                  <label for="email" class="sr-only">Username</label>
                  <input type="text" id="username" class="form-control" name="login" placeholder="Username">

                </div>
                <div class="form-group mb-4">
                  <label for="password" class="sr-only">Password</label>
                  <input type="password" id="password" class="form-control" name="login" placeholder="password">

                </div>
                <input name="login" id="login" class="btn btn-block btn-info mb-4" type="button" value="Login" onclick="userLogin()">
              </form>

            </div>
          </div>
        </div>
      </div>

    </div>
  </main>

  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="login.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>

</html>