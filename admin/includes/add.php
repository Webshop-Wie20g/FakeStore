<?php
session_start();

?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title></title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  
  <div class=" mb-5 mt-5">

    <div class="container-fluid">
      <div class="row">

        <div class=" details col-md-8 offset-md-2">

          <h3 class="text-center">Add New Product</h3>
          <form action="">
            <div class="form-group">
              <label for="inputid1">Name</label>
              <input type="text" class="form-control" placeholder="" id="name" required>
            </div>
            <div class="form-group">
              <label for="inputid2">Description</label>
              <textarea name="description" class="form-control" placeholder="" rows="5" id="description"
                required></textarea>
            </div>
            <div class="form-group">
              <label for="inputid3">Category</label>
              <input type="text" class="form-control" placeholder="" id="category" required>
            </div>

            <div class="form-group">
              <label for="inputid5">Units In Stock</label>
              <input type="number" class="form-control" placeholder="units in stock" id="unitsInStock" required>
            </div>
            <div class="form-group">
              <label for="inputid5">Price</label>
              <input type="number" class="form-control" placeholder="Price" id="price" required>
            </div>
            <div class="form-group">
              <label for="inputid6">Upload Image</label>
              <input type="file" name="file" id="image">
            </div>
            <button type="submit" class="btn btn-success" onclick="addProduct()">Add Product</button>
          </form>
        </div>
      </div>
    </div>

  </div>
  </div>

  <script src="../admin.js"></script>

</body>

</html>