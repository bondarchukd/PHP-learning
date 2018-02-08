<?php 
// echo "success";
session_start();
$email = $_POST["email"];
$password = $_POST["password"];
$username = $_POST["username"];

$connection = mysqli_connect("sql131.main-hosting.eu","u386269602_root","dbondarchuk1","u386269602_test");
$result = mysqli_query($connection,"insert into Users (Username, Password, Email) values ('$username','$password', '$email')");
$_SESSION["user_id"] = $username;
$_SESSION['login']=$email;
$_SESSION['pass']=$password;

// echo $result;
// echo "success";
// echo header("Location: https://www.yandex.ru");

?>