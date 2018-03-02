<?php
require_once('database.php');
session_start();

if($_POST) {

	$SESSION['email'] = $_POST['email'];
	$SESSION['password'] = $_POST['password'];

}

if(isset($_SESSION['email'])&&isset($_SESSION['password'])) {

	$result = mysqli_query($connection, "insert into users (EMAIL, PASSWORD) values ('".$_SESSION['email'].", '".$_SESSION['password']."')");
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>1</title>
</head>
<body>
<form method = "POST" action = "draft.php">
	<input type="email" name="email">
	<br>
	<input type="password" name="password">
	<br>
	<input type="submit" name="submit">
</form>

</body>
</html>