<?php
require_once('database.php');
session_stat();

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