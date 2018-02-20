<?php
session_start();
$email = $_POST["email"];
$password = $_POST["password"];
$username = $_POST["username"];

$connection = mysqli_connect("mysql.j820528.myjino.ru", "j820528", "dbondarchuk1",  "j820528_test");
$result = mysqli_query($connection,"select Username, Password, Email from Users where Username ='$username' and Password = '$password' and Email = '$email')");

if(mysqli_num_rows($result)!=1){    //такого пользователя нет

    // Header("Location: http://localhost:8888/PHP-learning/login.html");
    Header("login.html");
}
else{
$_SESSION["user_id"] = $username;
$_SESSION['login']=$email;
$_SESSION['pass']=$password;

echo "Welcome!";
}
?>