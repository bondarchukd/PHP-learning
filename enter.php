<?php

require_once('database.php');
session_start();

if ($_POST) {
	if(isset($_POST['username'])) {
		$_SESSION['email'] = $_POST['email'];
		$_SESSION['password'] = $_POST['password'];
		$_SESSION['username'] = $_POST['username'];

		$result = mysqli_query($connection,"insert into Users (Username, Password, Email) values ('".$_SESSION['username']. ",'".$_SESSION['password']."','".$_SESSION['email']."')");
		Header('Location: http://localhost:8888/PHP-learning/index.php?status=1', true, 301);
	}
	else {
		$_SESSION['email'] = $_POST['email'];
		$_SESSION['password'] = MD5($_POST['password']);

		$result = mysqli_query($connection,"SELECT * from Users WHERE Email='".$_SESSION['email']."' and Password='".$_SESSION['password']."'");
		
		if(mysqli_num_rows($result)!=1){    //такого пользователя нет
    			Header("Location: http://localhost:8888/PHP-learning/enter.php");//перенаправляем на login.php
    		}
    	else{	
		Header('Location: http://localhost:8888/PHP-learning/index.php?status=2', true, 301);
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Entering form</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
	
	<h1>Registration</h1>
		<form method="POST" action="enter.php">
		<input type="email" name="email" placeholder="email">
		<br><br>
		<input type="password" name="password" placeholder="password">
		<br><br>
		<input type="text" name="username" placeholder="David">
		<br><br>
		<input type="submit" name="submit">
	</form>

<h1>Login</h1>
	<form method="POST" action="enter.php">
		<input type="email" name="email" placeholder="email">
		<br><br>
		<input type="password" name="password" placeholder="password">
		<br><br>
		<input type="submit" name="submit">
	</form>
</body>
</html>