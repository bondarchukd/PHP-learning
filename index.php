<?php
require_once('database.php');
require_once('check_enter.php');

// SET TIME-ZONE GREETING
date_default_timezone_set('Europe/Moscow');
// G - 24-hour format of an hour without leading zeros (0 through 23)
// CHANGE TO SWITCH HERE
$Hour = date('G');
if ( $Hour >= 5 && $Hour <= 11 ) {
    $Greeting = "Good Morning";
} else if ($Hour >= 12 && $Hour <= 18 ) {
    $Greeting = "Good Afternoon";
} else if ( $Hour >= 19 || $Hour <= 4 ) {
    $Greeting = "Good Evening";
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Home page</title>
	<link rel = "stylesheet" type = "text/css" href = "CSS.css">
	<!-- JQERY embed -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<!-- this script reloads page in browser automatically after changes in sublime text 3-->
	<script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>
</head>
<body>

<?php 
if($_GET) {
	if (isset($_SESSION["username"])) {
		echo "<br><br><h1>" .$Greeting. " ". $_SESSION['username'] . "!</h1>";
		}
	if ($_GET["status"] == 1) {
		echo "You have been Registed<br><br>";
		?>
		<!-- Account verification -->
		<div> Please verify your account using email</div>
		<!-- send $_SESSION['email'] through $_GET below -->
		<a href='mail.php?email=<?php echo $_SESSION['email']?>'>SEND EMAIL</a>
		<br>
		<br>

		<?php
		}
	else{		
		echo "You have been Logined<br><br>";
		}
}

?>	

<!-- Drop-Down menu HTML-->
<div>
<?php
require('dropdown.html');
?>
</div>

</body>
</html>