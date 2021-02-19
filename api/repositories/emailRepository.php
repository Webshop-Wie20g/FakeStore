<?php
    $username = $_POST['username'];
    $email = $_POST['email'];

if (!empty($username) || !empty($email)) 
{
   $host = "localhost";
   $dbUsername = "root";
   $dbPassword = "";
   $dbname = "store";

    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

if (mysqli_connect_error()) {  
    die('Connect Error( '. mysqli_connect_errno().')'. mysqli_connect_error());} 
    else 
    {
    $SELECT = "SELECT email From newsletter Where email = ? Limit 1";
    $INSERT = "INSERT Into newsletter (username, email) values(?,?)";

    $stmt = $conn->prepare($SELECT);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->bind_result($email);
    $stmt->store_result();
    $rnum = $stmt->num_rows();

    if ($rnum==0) {
        $stmt->close();

        $stmt = $conn->prepare($INSERT);
        $stmt->bind_param("ss", $username,$email);
        $stmt->execute();
        echo "New e-mail sucessfully added";} 
    else 
    {
    echo "Email already registerd";
    }
$stmt->close();
$conn->close();

}

} else {
    echo "Type in all fields to continue";
    die();
}

?>