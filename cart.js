//getCartItems()

//Check amounts of objects in productList in order to render that amount on the cart button
function cartSpan(){
    cartSpan = productsList.length
    
   document.getElementById("cartSpan").innerHTML = productList.length
}
function checkout(){

    // behöver skicka localstorage[cart] som order till databasen innan localStorage.clear körs
    orderDetailes()

    alert("Tack för ditt köp!");

    localStorage.clear();
    location.reload();

}

async function orderDetailes(){
    
    let today = new Date();
    let dd = String(today.getDate()).padStart(2, '0');
    let mm = String(today.getMonth() + 1).padStart(2, '0');
    let yyyy = today.getFullYear();

    today = mm + '/' + dd + '/' + yyyy;
    console.log(today);
    
    const newOrder = {
        date: today
    }
    console.log("newOrder = ", newOrder)
    
    let body = new FormData()
    body.set("action", "saveOrder")
    body.set("order", JSON.stringify(newOrder))

    const result =  await makeRequest("./api/recievers/orderReciever.php", "POST", body)
    console.log(result)
}

orderDetailes()

async function makeRequest(url, method, body){
    try{
        const response = await fetch(url, {method, body})
        return response.json()
    } catch(err){
        console.log(err)
    }
}


function getCartItems() {
let productList = localStorage.getItem('productsInCart')
   
    if (productList !=null) {
        productList = JSON.parse(productList)    
    
    /*}   else{
        productList = localStorage.setItem(productList);
        productList = []
    */
    cartSpan()
    }

/*
    let showTotal = 0

    for (let i = 0; i < productList.length; i++) {
        
        productList = product[i];


    }
*/
}
