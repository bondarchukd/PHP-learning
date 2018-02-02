<?php 
// echo "success";
$email = $_POST["email"];
$password = $_POST["password"];

$connection = mysqli_connect("localhost","","","test");
$result = mysqli_query($connection,"insert into users (PASSWORD, EMAIL) values ('$password', '$email')");

echo "success";

?>