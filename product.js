window.addEventListener("load", initsite)



async function initsite(){
    const products = await makeRequest("./api/recievers/productReciever.php", "GET")
    
    renderProducts(products)
    console.log(products)
}

async function setCart(){
    let dateToSave = document.getElementById("dateInput").value
    let month = dateToSave[5]+dateToSave[6]
    let day = dateToSave[8]+dateToSave[9]
    
    
    if(!dateToSave.length) {
        
        return
    }
    
    const body = new FormData()
    
    body.set("day", day)
    body.set("month", month)
    
    const collectedName = await makeRequest("./server/addHoroscope.php" , "POST",body)
    console.log(collectedName)
    
    

    
    
    
    
}

function renderProducts(productList){
    
    let mainContainer = document.getElementById("mainContainer")
    
    
    
    productList.forEach((product) => {
        let productCard = document.createElement("div")
        productCard.classList.add("productCard")
        
        let nameContainer = document.createElement("h7")
        nameContainer.innerText = product.name
        nameContainer.id = "nameContainer"
        nameContainer.style.marginLeft = "4%"

        let descContainer = document.createElement("h7")
        descContainer.innerText = product.description
        descContainer.id = "descContainer"

        let buyBtn = document.createElement("button")
        buyBtn.innerText = "Add to cart"
        buyBtn.style.backgroundColor = "#F7941D"
        buyBtn.style.color = "white"
        buyBtn.addEventListener("click",function(){

            
        })
        

        let priceContainer = document.createElement("h7")
        priceContainer.innerText = product.price + " kr"
        priceContainer.id = "priceContainer"


        let imgContainer = document.createElement("img")
        imgContainer.id = "imgContainer"
        
        priceContainer.appendChild(buyBtn)
        productCard.append(imgContainer, nameContainer, descContainer, priceContainer)
        mainContainer.appendChild(productCard)
    });
    
    
    
    
  
}



async function makeRequest(url , method , body){
    try{
        const response = await fetch(url,{method , body})
        return response.json()


    }catch(err) {
        console.log(err)
    }
}