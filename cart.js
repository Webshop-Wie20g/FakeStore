window.addEventListener("load", initsite())
document.getElementById("checkOutBtn").addEventListener("click", checkOut)
document.getElementById("testBtn").addEventListener("click", getproductId)

/*document.getElementById("testBtn").addEventListener("click", function test(){

    alert("tack för ditt köp")
    orderDetailes()
    localStorage.clear("cart");
    location.reload();
})*/

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

//    behöver skicka localstorage[cart] som order till databasen innan localStorage.clear körs
    orderDetailes()
/*    alert("Thank you for buying")
    localStorage.clear()
    location.reload()
*/
}

async function orderDetailes(){
    let productList = localStorage.getItem('cart')

    let today = new Date();
    let dd = String(today.getDate()).padStart(2, '0');
    let mm = String(today.getMonth() + 1).padStart(2, '0');
    let yyyy = today.getFullYear();

    today = mm + '/' + dd + '/' + yyyy;
    

    const newOrder = {
        date: today,
        cartItems: JSON.stringify(productList)
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
console.log(productIdArray)
}


function getCartItems() {
    let productList = localStorage.getItem('cart')
        
   productList = JSON.parse(productList)

   
   let mainContainer = document.getElementById("mainContainer")
    
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

    let quantityContainer = document.createElement("h7")
    quantityContainer.innerText = productList[productNr].quantity
    quantityContainer.id = "quantityContainer"


    let priceContainer = document.createElement("h7")
    priceContainer.innerText = productList[productNr].product.price + " kr"
    priceContainer.id = "priceContainer"


    let imgContainer = document.createElement("img")
    imgContainer.id = "imgContainer"
    imgContainer.src = productList[productNr].product.image
       
    priceContainer.appendChild(buyBtn)
    productCard.append(imgContainer, nameContainer, descContainer, priceContainer, quantityContainer)
    mainContainer.appendChild(productCard)

    productNr++
    console.log(showTotal)
    document.getElementById("totalCost").innerHTML = showTotal
    });
    
}

async function getShippers(){
    const result = await makeRequest("./api/recievers/orderReciever.php", "GET")
    console.log(result)
}