<?php

if ($_GET) {


$id = $_GET["add"];
require_once('database.php');
session_start();
$result = mysqli_query($connection,"INSERT INTO todo (TODO) VALUES (
	'".$_GET["add"]."')"
);

Header("Location: http://localhost:8888/PHP-learning/todo.php");
}

?>