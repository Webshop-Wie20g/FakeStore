<?php
require("./../handlers/databaseHandler.php");

function addNewsletter($newsletter) {
     $db = new Database();
     return $db->runQuery("INSERT INTO newsletter (Name, email) VALUES (:name, :email);", $newsletter);
}
?>