window.addEventListener("load", initsite)


async function initsite(){
    const products = await makeRequest("./api/recievers/productReciever.php", "GET")
    
    renderProducts(products)
    console.log(products)
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