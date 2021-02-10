window.addEventListener("load", initsite)


function initsite(){

   
}

async function getAllProducts(){
    const result = await makeRequest("./api/recievers/productReciever.php", "GET")

}

async function makeRequest(url , method , body){
    try{
        const respone = await fetch(url,{method , body})
        return Response.json()


    }catch(err) {
        console.log(err)
    }
}