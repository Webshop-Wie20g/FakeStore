window.addEventListener("load", initsite)


function initsite(){
    getAllProducts()
    
}

async function getAllProducts(){
    const result = await makeRequest("./api/recievers/productReciever.php", "GET")
    console.log(result)
    
   /*  if(result !=undefined){
        result = JSON.parse(result)

    }else{
        
        result = [] 
        
    } */
    
    /* console.log(result) */
}

async function makeRequest(url , method , body){
    try{
        const response = await fetch(url,{method , body})
        return response.json()


    }catch(err) {
        console.log(err)
    }
}