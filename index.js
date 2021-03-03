window.addEventListener("load", initsite)



async function initsite(){
    const categories = await makeRequest("./api/recievers/categoryReciever.php", "GET")
    
    renderCategories(categories)
    console.log(categories)
}



function renderCategories(categoriesList){
    
    let mainContainer = document.getElementById("mainContainer")
    
   categoriesList.forEach((categories) => {
        
        let productCard = document.createElement("div")
        productCard.classList.add("productCard")
        
        let nameContainer = document.createElement("a")
        nameContainer.innerText = categories.name
        nameContainer.id = "nameContainer"
        nameContainer.style.marginLeft = "4%"
        if (nameContainer.innerText == "TV"){
            nameContainer.href = "/tv.html"

        }else if(nameContainer.innerText == "Datorer"){
            nameContainer.href = "/pc.html"
        }else if(nameContainer.innerText == "Telefoner"){
            nameContainer.href = "/phone.html"
        }

        
        productCard.append(nameContainer)
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