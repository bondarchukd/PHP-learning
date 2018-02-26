<?php
require_once('database.php');
session_stat();
// HERE SHOULD BE PHP CODE
if ($POST) {
	if(isset($POST['fio'])) {
		$_SESSION['email'] = $_POST['email'];
		$_SESSION['password'] = $_POST['password'];
		$_SESSION['fio'] = $_POST['fio'];

		$result = mysqli_query($connection,"insert into Users (Username, Password, Email) values ('$username','$password', '$email')");
		header('Location: http://localhost:8888/php-learning/index?status=1.php', true, 301);
	}
	else {
		$_SESSION['email'] = $_POST['email'];
		$SESSION['password'] = MD5($_POST['password']);
		header('Location: http://localhost:8888/php-learning/index?status=2.php', true, 301);
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Entering form</title>
</head>
<body>
	
	<h1>Registration</h1>
		<form method="POST" action="register.php">
		<input type="email" name="email" placeholder="email">
		<br><br>
		<input type="password" name="password" placeholder="password">
		<br><br>
		<input type="text" name="fio" placeholder="Иванов Иван Иванович">
		<br><br>
		<input type="submit" name="submit">
	</form>

<h1>Login</h1>
	<form method="POST" action="register.php">
		<input type="email" name="email" placeholder="email">
		<br><br>
		<input type="password" name="password" placeholder="password">
		<br><br>
		<input type="submit" name="submit">
	</form>
</body>
</html>