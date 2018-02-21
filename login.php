<?php
// http://form.guide/php-form/php-login-form.html
// https://claytonjohnson.com/create-a-portfolio-client-area-using-php-and-mysql-part-3
// we must compare password from DB with md5 from user!

session_start();
$email = $_POST["email"];
$password = $_POST["password"];
// $username = $_POST["username"];

$connection = mysqli_connect("mysql.j820528.myjino.ru", "j820528", "dbondarchuk1",  "j820528_test");
$result = mysqli_query($connection,"select Password, Email from Users where Password = '$password' and Email = '$email')");

if(mysqli_num_rows($result)!=1){    //такого пользователя нет

    // Header("Location: http://localhost:8888/PHP-learning/login.html");
    // Header("Location: http://localhost/PHP-learning/login.html");
    Header("login.html");
}
else{
// $_SESSION["user_id"] = $username; // should it be in sessoin?
$_SESSION['login']=$email;
$_SESSION['pass']=$password;

echo "Welcome!";
}
?>