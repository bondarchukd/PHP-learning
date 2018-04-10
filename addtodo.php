<?php

if ($_GET) {


$id = $_GET["id"];
require_once('database.php');
session_start();
$result = mysqli_query($connection,"INSERT INTO todo (todo)
VALUES ()");

}



?>