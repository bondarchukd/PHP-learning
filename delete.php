<?php

if ($_GET) {


$id = $_GET["id"];
require_once('database.php');
session_start();
$result = mysqli_query($connection,"DELETE FROM users
WHERE id = ".$id." ");

echo "DELETE FROM users
WHERE id = ".$id."";



}



?>