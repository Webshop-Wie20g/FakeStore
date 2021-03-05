

       

async function makeRequest(url,method,body){

  try {

      const respone = await fetch(url,{method,body})

  
  return respone.json()

} catch(error) {
  }

}


async function userLogin(){


  
  username = document.getElementById("username").value
  password = document.getElementById("password").value



   let body = new FormData()
   body.append("action", "loginUser")
   body.append("username",username)
   body.append("password",password)

   const results = await makeRequest("./../api/recievers/UserReceiver.php", "POST", body)
   if (results == "LoggedIn") {
    window.location.href="admin.php"
  }
  
   
}