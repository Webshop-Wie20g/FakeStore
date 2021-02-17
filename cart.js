//Check localstorage for a key. If noone exist, it creates one. We can then use productList for other purposes
function getCartItems() {
    
    let productList = localStorage.getItem('productsInCart')
   
    if (productList !=null) {
        productList = JSON.parse(productList)    
    }else{
        productList = localStorage.setItem(productList);
        productList = []
    }
    cartItemsAmount()
}
//Check amounts of objects in productList in order to render that amount on the cart button
function cartItemsAmount(){
    cartSpan = productsList.length
    
   //document.getElementByName("total-count").innerHTML = productList.length
}


async function orderDetailes(){
    
    let today = new Date();
    let dd = String(today.getDate()).padStart(2, '0');
    let mm = String(today.getMonth() + 1).padStart(2, '0');
    let yyyy = today.getFullYear();

    today = mm + '/' + dd + '/' + yyyy;
    console.log(today);

    let body = new FormData()
   // body.set("action", "saveOrder")
    body.set("today", JSON.stringify(today))

    const result =  await makeRequest("./api/recievers/orderReciever.php", "POST", body)

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