window.addEventListener("load", initsite())
document.getElementById("checkOutBtn").addEventListener("click", checkOut())

function initsite(){
    
    let productList = localStorage.getItem('cart')
    
    if (productList !=null) {
   
        getCartItems()
    }
    
}

//Check amounts of objects in productList in order to render that amount on the cart button
async function cartSpan(){
    
    let productList = localStorage.getItem('cart')
    productList = JSON.parse(productList)

    //document.getElementById("cartSpan").innerHTML = productList.length
}
function checkOut(){

    // behöver skicka localstorage[cart] som order till databasen innan localStorage.clear körs
  //  orderDetailes()

    alert("Tack för ditt köp!");

 //   localStorage.clear();
 //   location.reload();

}

async function orderDetailes(){
    let productList = JSON.parse(localStorage.getItem('cart'))
    
    let today = new Date();
    let dd = String(today.getDate()).padStart(2, '0');
    let mm = String(today.getMonth() + 1).padStart(2, '0');
    let yyyy = today.getFullYear();

    today = mm + '/' + dd + '/' + yyyy;

    let name = productList[1]

    const newOrder = {
        date: today,
        name: name
    }
    
    let body = new FormData()
    body.set("action", "saveOrder")
    body.set("order", JSON.stringify(newOrder))

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


function getCartItems() {
let productList = localStorage.getItem('cart')
   /*
    if (productList !=null) {
        productList = JSON.parse(productList)    
    
    }   else{
        productList = localStorage.setItem(productList);
        productList = []
    */
        
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

       

    let priceContainer = document.createElement("h7")
    priceContainer.innerText = productList[productNr].product.price + " kr"
    priceContainer.id = "priceContainer"


    let imgContainer = document.createElement("img")
    imgContainer.id = "imgContainer"
    imgContainer.src = productList[productNr].product.image
       
    priceContainer.appendChild(buyBtn)
    productCard.append(imgContainer, nameContainer, descContainer, priceContainer)
    mainContainer.appendChild(productCard)

    productNr++
    console.log(showTotal)
    document.getElementById("totalCost").innerHTML = showTotal
    });
    

}