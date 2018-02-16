<?php
session_start();
$connection = mysqli_connect("mysql.j820528.myjino.ru", "j820528", "dbondarchuk1", "j820528_test");

// connection checking
if (isset($connection)) {
	echo 'Connected';
}

$result = mysqli_query($connection,"SELECT * from Users WHERE Email='".$_SESSION['login']."' and Password='".$_SESSION['pass']."'");

if(mysqli_num_rows($result)!=1){    //такого пользователя нет

    Header("Location: http://localhost:8888/PHP-learning/login.html");  //перенаправляем на login.php   
}
else{   //пользователь найден, можем выводить все что нам надо
echo "<h1> Database structure below</h1>";
echo "<table>
		<caption>Usernames</caption>
		<tr>
			<th>Username</th>
			<th>Email</th>
		</tr>
		<tr><td>Here should be shown result of SQL request</td></tr>";
echo "<a href='logout.php'>Logout</a>";		
	}	
?>