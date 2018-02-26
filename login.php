<?php
// http://form.guide/php-form/php-login-form.html
// https://claytonjohnson.com/create-a-portfolio-client-area-using-php-and-mysql-part-3
// https://www.ibm.com/developerworks/ru/library/os-phpajax/ - tutorial about building php page

session_start();
require('connection.php');

$email = $_POST["email"];
$password = $_POST["password"];

$result = mysqli_query($connection,"select Password, Email from Users where Password = '$password' and Email = '$email'");

if(mysqli_num_rows($result)!=1){    //такого пользователя нет

    Header("Location: http://localhost:8888/PHP-learning/login.html");
    // Header("Location: http://localhost/PHP-learning/login.html");
    // Header("login.html");
}
else{

$_SESSION['login']=$email;
$_SESSION['pass']=$password;

echo "Welcome!";
}
?>