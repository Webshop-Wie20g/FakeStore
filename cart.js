function initSite(){
    getCartItems()
}

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
/* Clear the cart when pressing the checkout button
document.getElementByName("...").addEventListener("click", function clearCart(){

    localStorage.clear();
    location.reload();
})
*/


async function orderDetailes(){
    
    let body = new FormData()
    body.set("test")
    const result =  await makeRequest("./api/recievers/orderReciever.php", "POST", body)

}


async function makeRequest(url, method, body){
    try{
        const response = await fetch(url, {method, body})
        return response.json()
    } catch(err){
        console.log(err)
    }
}