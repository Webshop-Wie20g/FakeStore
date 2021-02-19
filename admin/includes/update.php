<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <script src="../admin.js"></script>
      <title>Admin page</title>
</head>

<body onload="getAllproducts()">

               <h2>Update Stock</h2>
                  <div class="field">
                     <label> Produkt:</label>
                     <select id="id" class="productList"></select>

                     <label> Total In Stock:</label>
                     <input type="text" name="newtotal" id="newTotal" maxlength="50"/>
                     <button onclick="update()"> UPDATE</button>
                  </div>
</body>

         


         
   
</html>