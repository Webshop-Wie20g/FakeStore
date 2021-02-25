<?php
require("./api/handlers/databaseHandler.php");
//require("./../classes/orderClasses.php");

function addNewsletter($newsletter) {
     $db = new Database();
     
     return $db->runQuery("INSERT INTO newsletter (name, email) Values (:name, :email)", $newsletter);
}
?>