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

function setItems(products){
    console.log(products)
    
    let cartItems = localStorage.getItem("productsInCart")
    
    // hämtar och sparar prudukterna från LocalStorage och parsar om till object
    
    if(cartItems !=null){
        cartItems = JSON.parse(cartItems)

    }else{
        
        cartItems = [] 
        
    }
    
    cartItems.push(products)
    // pushar in product i array
    
    document.getElementById("cartSpan").innerHTML = cartItems.length
    // cartSpan får får samma värde som lika många produkter i cartItems
    
    localStorage.setItem("productsInCart", JSON.stringify(cartItems))
    //sparar en key och gör om från object till string så den kan sparar i localStorage
}
setItems()

async function makeRequest(url , method , body){
    try{
        const response = await fetch(url,{method , body})
        return response.json()


    }catch(err) {
        console.log(err)
    }
}