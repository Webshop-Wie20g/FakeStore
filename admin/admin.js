async function makeRequest(url,method,body){

    try {

        const respone = await fetch(url,{method,body})

    
    return respone.json()

} catch(error) {
        console.log(error)
    }

}

async function getAllproductsFromAdmin(){
    let body = new FormData()
    body.append("action", "productList")

    const results = await makeRequest("../../api/recievers/AdminReceiver.php","POST",body)
    console.log(results);
    var table = document.createElement("table");
    table.className = "table"
                    var productID = document.createElement("th");
                    productID.innerHTML = "ID";
                    var productName = document.createElement("th");
                    productName.innerHTML = "Name";
                    var productCategory = document.createElement("th");
                    productCategory.innerHTML = "Price";
                    var productUnitsInStock = document.createElement("th");
                    productUnitsInStock.innerHTML = "Units in stock";
                    table.appendChild(productID);
                    table.appendChild(productName);
                    table.appendChild(productCategory);
                    table.appendChild(productUnitsInStock);
                    for (var i = 0; i < results.length; i++) {
                        var tr = document.createElement("tr");
                        var productIDLoop = document.createElement("td");
                        productIDLoop.innerHTML = results[i]["id"];
                        tr.appendChild(productIDLoop);
                        var productNameLoop = document.createElement("td");
                        productNameLoop.innerHTML = results[i]["name"];
                        tr.appendChild(productNameLoop);
                        var productCategoryLoop = document.createElement("td");
                        productCategoryLoop.innerHTML = results[i]["price"];
                        tr.appendChild(productCategoryLoop);
                        var productUnitsInStockLoop = document.createElement("td");
                        productUnitsInStockLoop.innerHTML = results[i]["unitsInStock"];
                        tr.appendChild(productUnitsInStockLoop);
                        table.appendChild(tr);
                    }
                   let productListDiv =  document.getElementById("ProductList")
                   productListDiv.appendChild(table)

}




async function addProduct(name,price,description,unitsInStock, image,category){


    
     name = document.getElementById("name").value
     price = document.getElementById("price").value
     image =  document.getElementById("image").value
     category = document.getElementById("category").value
     description = document.getElementById("description").value
     unitsInStock = document.getElementById("unitsInStock").value
 
 
 
      let body = new FormData()
      body.append("action", "addProduct")
      body.append("name",name)
      body.append("price",price)
      body.append("category",category)
      body.append("image",image)
      body.append("description",description)
      body.append("unitsInStock",unitsInStock)
 
      
      
      
  
      const results = await makeRequest("../../api/recievers/AdminReceiver.php", "POST", body)
      console.log(results)
      
      window.location("admin.php")
  }
 
  async function getAllproducts(){
    let body = new FormData()

    const results = await makeRequest("../../api/recievers/AdminReceiver.php","GET")
    
    console.log(results);
    
    for (var i = 0; i < results.length; i++) {
        var option = document.createElement("option");
        option.setAttribute("value", results[i]["id"]);
        option.innerHTML = results[i]["name"];
        var querys= document.getElementsByClassName("productList")[0]
        querys.appendChild(option);
    }
        

}

 

  async function removeProductFromList(productIds){

    let productid = document.getElementById("id").value
    console.log(productid)

    let body = new FormData()
    body.append("action","remove")
    body.append("productIdToRemove",productid)
    

    const results = await makeRequest("../../api/recievers/AdminReceiver.php", "POST", body)
    console.log(results)
    if(results){
        alert("product removed")
        location.reload();
    }
    
    

 
}


async function update(id,stock) {

    let productid = document.getElementById("id").value
    var amount = document.getElementById("newTotal").value

    let body = new FormData()
    body.append("action","updateStock")
    body.append("id",productid)
    body.append("amount",amount)
    const results = await makeRequest("../../api/recievers/AdminReceiver.php", "POST", body)
    console.log(results)
    if(results){
        alert("product updated")
        location.reload();
    }
}


