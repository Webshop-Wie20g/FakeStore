window.addEventListener("load", initsite())
document.getElementById("checkOutBtn").addEventListener("click", checkOut)

function initsite(){
    
    
    if (localStorage.getItem('cart') !=null) {
   
        getCartItems()
    }else{
            console.log("inga produkter i cart")
    }
       
    
    
    
}

//Check amounts of objects in productList in order to render that amount on the cart button
function cartSpan(){
    
    let productList = localStorage.getItem('cart')
    productList = JSON.parse(productList)

    //document.getElementById("cartSpan").innerHTML = productList.length
}
function checkOut(){
    
    if (localStorage.getItem('cart') !=null) {
   
        orderDetailes()
    alert("Thank you for buying")
    localStorage.clear()
    location.reload()

    }else{
        alert("inga produkter i cart")
    }


    
}

async function orderDetailes(){
    let productList = localStorage.getItem('cart')

    let today = new Date();
    let dd = String(today.getDate()).padStart(2, '0');
    let mm = String(today.getMonth() + 1).padStart(2, '0');
    let yyyy = today.getFullYear();

    today = mm + '/' + dd + '/' + yyyy;
    

    const newOrder = {
        date: today
    //    cartItems: JSON.stringify(productList)
    }

    let body = new FormData()
    body.set("action", "saveOrder")
    body.set("order", JSON.stringify(newOrder))

    console.log("detta kommer från cart.js ", newOrder)

    const result =  await makeRequest("./api/recievers/orderReciever.php", "POST", body)
    console.log(result)
}


async function makeRequest(url, method, body){
    try{
        const response = await fetch(url, {method, body})
        return response.json()
    } catch(err){
        console.log(err)
    }
}

productIdArray = [0]

function getproductId(){

    let productList = localStorage.getItem('cart')
    productList = JSON.parse(productList)



    let productNr = 0
    productList.forEach((product) => {
        productId = productList[productNr].product.id
        productIdArray.push(productId)
        
        productNr++
    })
    
}


function getCartItems() {
    let productList = localStorage.getItem('cart')
        
   productList = JSON.parse(productList)

   
   let mainContainerCart = document.getElementById("mainContainerCart")
    
    let productNr = 0
    let showTotal = 0

   productList.forEach((product) => {

    showTotal = showTotal + productList[productNr].product.price * productList[productNr].quantity

    let productCard = document.createElement("div")
    productCard.classList.add("productCard")

    let nameContainer = document.createElement("h7")
    nameContainer.innerText = productList[productNr].product.name
    nameContainer.id = "nameContainer"
    nameContainer.style.marginLeft = "4%"


    let descContainer = document.createElement("h7")
    descContainer.innerText = productList[productNr].product.description
    descContainer.id = "descContainer"

    let buyBtn = document.createElement("button")
    buyBtn.innerText = "Remove"
    buyBtn.style.backgroundColor = "#F7941D"
    buyBtn.style.color = "white"
    buyBtn.data = product
    buyBtn.addEventListener("click", removeItem)
    function removeItem(){

        if (product.quantity = 1) {
            productList.splice(product.id, 1)
        }else{
            product.quantity - 1
        }
        console.log(productList)
    }


    let quantityContainer = document.createElement("h7")
    quantityContainer.innerText = productList[productNr].quantity
    quantityContainer.id = "quantityContainer"


    let priceContainer = document.createElement("h7")
    priceContainer.innerText = productList[productNr].product.price + " kr"
    priceContainer.id = "priceContainer"


    let imgContainer = document.createElement("img")
    imgContainer.id = "imgContainer"
    imgContainer.src = productList[productNr].product.image
       
    //priceContainer.appendChild(buyBtn)
    productCard.append(imgContainer, nameContainer, descContainer, priceContainer, quantityContainer)
    mainContainerCart.appendChild(productCard)



    productNr++
    console.log(showTotal)
    document.getElementById("totalCost").innerHTML = showTotal
    });
    
}


/* 
async function getShippers(){
    const result = await makeRequest("./api/recievers/orderReciever.php", "GET")
    
        let resultNr = 0
        const shipperArray = []

       
        result.forEach((name) => {
            
        document.getElementById('name').value="result[resultNr].name"
        resultNr++

 
            let shipperResult = document.getElementById("name").value

            let body = new FormData()
            body.append("shipper", "1231243")





          document.getElementById("shipperOne").value= "123"
            


            document.getElementById('personlist').value=Person_ID;


            let shipper = (result[resultNr].name)
            shipperArray.push(shipper)


            console.log(result[resultNr].name)
    
            
 shipperResult.getAttribute("value", result[resultNr].name) 
         

									<select>
										<option selected="selected">All Category</option>
										<option>watch</option>
										<option>mobile</option>
										<option>kid’s item</option>
									</select>

 
    });


    
    
}

        
getShippers()*/ 