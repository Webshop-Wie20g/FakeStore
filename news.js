


async function addNewsletter() {
        const newsletter = {
            name: document.getElementById("name").value,
            email: document.getElementById("email").value
    }

    let body = new FormData()
    body.append("action", "add")
    body.append("newsletter", JSON.stringify(newsletter))

    const result = await makeRequest("./api/recievers/newsletterReceiver.php", "POST", body)
    console.log(result)
}
async function makeRequest(url, method, body) {
    console.log(url,method)
    try{
        const response = await fetch(url, {method, body})
        return await response.json() 
    } catch(err) {
        console.log(err)
    }
}