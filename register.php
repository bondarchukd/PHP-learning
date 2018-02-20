<?php 
// echo "success";
session_start();

$email = $_POST["email"];
$password = $_POST["password"];
$username = $_POST["username"];

// // $connection = mysqli_connect("sql131.main-hosting.eu","u386269602_root","dbondarchuk1","u386269602_test");
// // $connection = mysqli_connect('localhost', '', '', 'test');
$connection = mysqli_connect("mysql.j820528.myjino.ru", "j820528", "dbondarchuk1",  "j820528_test");
$result = mysqli_query($connection,"insert into Users (Username, Password, Email) values ('$username','$password', '$email')");
$_SESSION["user_id"] = $username;
$_SESSION['login']=$email;
$_SESSION['pass']=$password;

// session_start();

// $connection = mysqli_connect("mysql.j820528.myjino.ru", "j820528", "dbondarchuk1", "j820528_test");

// $result = mysqli_query($connection,"SELECT * from Users WHERE Email='".$_SESSION['login']."' and Password='".$_SESSION['pass']."'");


// if(mysqli_num_rows($result)!=1){    //такого пользователя нет

//     // Header("Location: http://localhost:8888/PHP-learning/login.html"); //перенаправляем на login.php
//     Header("login.html");
// }

// else {
// $_SESSION["user_id"] = $username;
// $_SESSION['login']=$email;
// $_SESSION['pass']=$password;
// }

?>