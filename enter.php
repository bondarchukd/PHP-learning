<?php

require_once('database.php');
session_start();

if ($_POST) {
	if(isset($_POST['username'])) {
		$_SESSION['email'] = $_POST['email'];
		$_SESSION['password'] = MD5($_POST['password']);
		$_SESSION['username'] = $_POST['username'];
		
		// Check exist of email
		$userExists = mysqli_query($connection,"SELECT * from users WHERE Email = '".$_SESSION['email']."'");
		if(mysqli_num_rows($userExists==1)) {
			echo "This email has already been registered";
			die();
		}

		// registration
		$result = mysqli_query($connection,"INSERT INTO users (USERNAME, PASSWORD, EMAIL) VALUES(
			'".$_SESSION['username']. ",
			'".$_SESSION['password']."',
			'".$_SESSION['email']."')"
		);

		Header('Location: http://localhost:8888/PHP-learning/index.php?status=1', true, 301);
	}
	else {
		$_SESSION['email'] = $_POST['email'];
		$_SESSION['password'] = MD5($_POST['password']);

		// login
		$result = mysqli_query($connection,"SELECT * from users WHERE Email='".$_SESSION['email']."' and Password='".$_SESSION['password']."'");


		if(mysqli_num_rows($result)!=1){ //такого пользователя нет
    			Header("Location: http://localhost:8888/PHP-learning/enter.php");//перенаправляем на enter.php
    			die();
    		}

    	$_SESSION['username'] = mysqli_fetch_array($result)[1];
		Header('Location: http://localhost:8888/PHP-learning/index.php?status=2', true, 301);
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Entering form</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src= "JS.js"></script>
	
</head>
<body>
	
	<h1>Registration</h1>
	<form method="POST" action="enter.php">
		<input onkeyup="check_reg()" class = "emailReg" type="email" name="email" placeholder="email">
		<br><br>
		<input onkeyup ="check_reg()" class = "passReg" type="password" name="password" placeholder="password">
		<br><br>
		<input onkeyup="check_reg()" class = "passReg" type="password" name="passwordCheck" placeholder="password"><br><br>
		<input class = "userReg" type="text" name="username" placeholder="David">
		<br><br>
		<input type="submit" name="submit">
	</form>

	<h1>Login</h1>
	<form method="POST" action="enter.php">
		<input class = "emailLog" type="email" name="email" placeholder="email">
		<br><br>
		<input class = "passLog" type="password" name="password" placeholder="password">
		<br><br>
		<input type="submit" name="submit">
	</form>
	
</body>
</html>