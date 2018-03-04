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
	<!-- Drop-Down menu JS -->
	<script type="text/javascript">
	$(function() {
	$("#item").click(function() {
		$( "#submenu" ).slideToggle( "slow", function() {

  			});
		});
	});

	</script>	
</head>
<body>
<?php 
if($_GET) {
	if (isset($_SESSION["username"])) {
		echo "<br><br><h1>" .$Greeting. " ". $_SESSION['username'] . "!</h1>";
		}
	if ($_GET["status"] == 1) {
		echo "You have been Registed<br><br>";
		}
	else{		
		echo "You have been Logined<br><br>";
		}
}

?>
<!-- Drop-Down menu HTML-->
<div class = "menu">
	<div id = "item">Drop-Down</div>
	<div id = "submenu">
		<a href="table.php">Table</a>
		<a href="weather.html">Get weather!</a>
		<a href="logout.php">Logout</a>
	</div>
</div>		
</body>
</html>