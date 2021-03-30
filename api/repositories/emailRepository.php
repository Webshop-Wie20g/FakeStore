<?php
require("./../handlers/databaseHandler.php");

function addNewsletter($newsletter) {
     $db = new Database();
     return $db->runQuery("INSERT INTO newsletter (name, email) VALUES (:name, :email);", $newsletter);
}
?>