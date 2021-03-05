<?php
require("./../handlers/databaseHandler.php");

function addNewsletter($newsletter) {
     $db = new Database();
     return $db->runQuery("INSERT INTO user (userName, email) VALUES (:name, :email);", $newsletter);
}
?>