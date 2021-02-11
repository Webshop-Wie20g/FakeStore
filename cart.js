/*if (localStorage.getItem("cart") === null) {
    localStorage.setItem('cart');
}else{
    console.log('hejhej')
}
*/


//const storedOrder = JSON.stringify(window.localStorage.getItem(cart))


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