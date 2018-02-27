<?php 

session_start();

require ('connection.php');

$email = $_POST["email"];
$password = $_POST["password"];
$username = $_POST["username"];

$result = mysqli_query($connection,"insert into Users (Username, Password, Email) values ('$username','$password', '$email')");

$_SESSION["user_id"] = $username;
$_SESSION['login']=$email;
$_SESSION['pass']=$password;


?>