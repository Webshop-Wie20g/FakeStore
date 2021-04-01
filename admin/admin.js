async function makeRequest(url,method,body){

    try {

        const respone = await fetch(url,{method,body})

    
    return respone.json()


} catch(error) {

    console.log('Error happened here!')
    console.error(error)
    }

}

async function getAllproductsFromAdmin(){
    let body = new FormData()
    body.append("action", "productList")

    const results = await makeRequest("../../api/recievers/AdminReciever.php","POST",body)
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




async function addProduct(name,price,description,unitsInStock,image){


    
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
 
      
      
      
  
      const results = await makeRequest("../../api/recievers/AdminReciever.php", "POST", body)
      
    //   window.location("admin.php")
  }
 
  async function getAllproducts(){
    let body = new FormData()

    const results = await makeRequest("../../api/recievers/AdminReciever.php","GET")
    
    
    for (var i = 0; i < results.length; i++) {
        var option = document.createElement("option");
        option.setAttribute("value", results[i]["id"]);
        option.innerHTML = results[i]["name"];
        var querys= document.getElementsByClassName("itemId")[0]
        querys.appendChild(option);
    }
        

}

 

  async function removeProductFromList(productIds){

    let productid = document.getElementById("id").value

    let body = new FormData()
    body.append("action","remove")
    body.append("productIdToRemove",productid)
    

    const results = await makeRequest("../../api/recievers/AdminReciever.php", "POST", body)
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
    const results = await makeRequest("../../api/recievers/AdminReciever.php", "POST", body)
    if(results){
        alert("product updated")
        location.reload();
    }
}


async function showNewsLetterSubscribers() {

    let body = new FormData()
    body.append("action", "showSubscribers")

    const results = await makeRequest("../../api/recievers/AdminReciever.php","POST",body)
    var table = document.createElement("table");
    table.className = "table"
                    var productID = document.createElement("th");
                    productID.innerHTML = "id";
                    var productName = document.createElement("th");
                    productName.innerHTML = "Email";
                    var productCategory = document.createElement("th");
                    productCategory.innerHTML = "Username";
      
                    table.appendChild(productID);
                    table.appendChild(productName);
                    table.appendChild(productCategory);
                    for (var i = 0; i < results.length; i++) {
                        var tr = document.createElement("tr");
                        var productIDLoop = document.createElement("td");
                        productIDLoop.innerHTML = results[i]["id"];
                        tr.appendChild(productIDLoop);
                        var productNameLoop = document.createElement("td");
                        productNameLoop.innerHTML = results[i]["userName"];
                        tr.appendChild(productNameLoop);
                        var productCategoryLoop = document.createElement("td");
                        productCategoryLoop.innerHTML = results[i]["email"];
                        tr.appendChild(productCategoryLoop);

                        table.appendChild(tr);
                    }
                   let productListDiv =  document.getElementById("ProductList")
                   productListDiv.appendChild(table)
}







async function getOrders(){
    let body = new FormData()
    body.append("action", "orderList")

    const results = await makeRequest("../../api/recievers/AdminReciever.php","POST",body)
    var table = document.createElement("table");
    table.className = "table"
                    var dateth = document.createElement("th");
                    dateth.innerHTML = "Date";

                    var idth = document.createElement("th");
                    idth.innerHTML = "Order ID";
                    var statusth = document.createElement("th");
                    statusth.innerHTML = "Status";

                    table.appendChild(dateth);
                    table.appendChild(idth);
                    table.appendChild(statusth);

                    for (var i = 0; i < results.length; i++) {
                        var tableRow = document.createElement("tr");
                        var dateTd = document.createElement("td");
                        dateTd.innerHTML = results[i]["date"];
                        tableRow.appendChild(dateTd);
                        var orderIdTd = document.createElement("td");
                        orderIdTd.innerHTML = results[i]["id"];
                        tableRow.appendChild(orderIdTd);
                        var status = document.createElement("td");
                        status.innerHTML = results[i]["status"];
                        if(results[i]["status"]==1){
                            status.innerHTML = "Shipped"
                        } else {
                            status.innerHTML = "Not Shipped"
                        }
                        tableRow.appendChild(status);
                        table.appendChild(tableRow);
                    }

var insert = document.getElementById("inserthere");
insert.appendChild(table)
}



async function makeRequest(url,method,body){

    try {

        const respone = await fetch(url,{method,body})

    
    return respone.json()

} catch(error) {
    }

}