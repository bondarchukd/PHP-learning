<?php
error_reporting(E_ALL); ini_set('display_errors', 1);
$email = $_POST["email"];
$password = $_POST["password"];

$connection = mysqli_connect("localhost","","","test");
$query = mysqli_query($connection,"select * from 'users' where PASSWORD = '"$password"' and EMAIL = '"$email"';");
$result = mysqli_query($connection, $query) or die (mysqli_error($connection));
$count = mysqli_num_rows($result);
if ($count == 1) {
	$_SESSION["email"] = $email;
	header("Location:welcome.php")
} else {
	echo "Invalid email or password";
}

if (isset ($_SESSION['email'])) {
	$email = $_SESSION['email'];
echo "Hai" . $email . "";
echo "<a href='logout.php'>Logout</a>";	
} else{}
?>	