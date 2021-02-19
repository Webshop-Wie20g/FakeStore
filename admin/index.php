  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HomeTech - Admin Panel</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" integrity="sha384-vSIIfh2YWi9wW0r9iZe7RJPrKwp6bG+s9QZMoITbCckVJqGCCRhc+ccxNcdpHuYu" crossorigin="anonymous">


  </head>

  <body>
  <?php include 'includes/header.php';?>
    <div class="job-profile mb-4">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-4 col-lg-3">
  <?php include 'includes/sidebar.php';?>

          </div>
          <div class="col-md-8 col-lg-9">
            <div class="row">
              <div class="col-md-6 col-lg-4">
                <div class="user-job-post">
                  <span style="font-size: 20px; color: Dodgerblue;">


              <i class="fas fa-plus fa-5x"></i>
              </span>
                      <h4>Add New Product</h4>
                    </div>

              </div>

              <div class="col-md-6 col-lg-4">
                <div class="user-job-post">
                  <span style="font-size: 20px; color: Dodgerblue;">


  <i class="fas fa-edit fa-5x"></i>
    </span>
                      <h4>Edit Products</h4>
                    </div>

              </div>
              <div class="col-md-6 col-lg-4">
                <div class="user-job-post">
                  <span style="font-size: 20px; color: green;">


              <i class="fas fa-warehouse fa-5x"></i>
              </span>
                      <h4> <a href="includes/show.php"> View Inventory </a></h4>
                    </div>

              </div>


              <div class="col-md-6 col-lg-4">
                <div class="user-job-post">
                  <span style="font-size: 20px; color: Dodgerblue;">


              <i class="fas fa-cart-arrow-down fa-5x"></i>
              </span>
                      <h4>Orders</h4>
                    </div>

              </div>
              <div class="col-md-6 col-lg-4">
                <div class="user-job-post">
                  <span style="font-size: 20px; color: Dodgerblue;">


  <i class="far fa-newspaper fa-5x"></i>
    </span>
                      <h4>Newsletter</h4>
                    </div>

              </div>

              <div class="col-md-6 col-lg-4">
                <div class="user-job-post">
                  <span style="font-size: 20px; color: Dodgerblue;">


  <i class="fas fa-users fa-5x"></i>
    </span>
                      <h4>Users</h4>
                    </div>

              </div>
            </div>
          </div>
        </div>
      </div>



    </div>

  <?php include("includes/footer.php");?>