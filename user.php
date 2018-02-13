<?php
echo "<h1>User Page after login</h1>";

session_start();
// echo $_SESSION['login'];
// echo $_SESSION['pass'];
// $connection = mysqli_connect("sql131.main-hosting.eu","u386269602_root","dbondarchuk1","u386269602_test");

$connection = mysqli_connect('localhost', '', '', 'test');
// $connection = mysqli_connect("mysql.j820528.myjino.ru", "j820528", "dbondarchuk1", "j820528_test");

$result = mysqli_query($connection,"SELECT * from Users WHERE Email='".$_SESSION['login']."' and Password='".$_SESSION['pass']."'");


if(mysql_num_rows($result)!=1){    //такого пользователя нет

    Header("Location: http://localhost:8888/PHP-learning/login.html");  //перенаправляем на login.php   
}
else{   //пользователь найден, можем выводить все что нам надо
    echo "Добро Пожаловать! ";
    echo $_SESSION['login'];
    echo "<a href='logout.php'>Logout</a>";
    echo "<a href='database_page.php'><button>Перейти на следующую страницу</button></a>";
}
?>