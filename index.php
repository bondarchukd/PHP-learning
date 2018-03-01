<?php
require_once('database.php');
require_once('check_enter.php');

// SET TIME-ZONE GREETING
date_default_timezone_set('Europe/Moscow');
// G - 24-hour format of an hour without leading zeros (0 through 23)
$Hour = date('G');
if ( $Hour >= 5 && $Hour <= 11 ) {
    $Greeting = "Good Morning!";
} else if ($Hour >= 12 && $Hour <= 18 ) {
    $Greeting = "Good Afternoon!";
} else if ( $Hour >= 19 || $Hour <= 4 ) {
    $Greeting = "Good Evening!";
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Home page</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>
	<script type="text/javascript">
$(function() {
	$("#item").click(function() {
		$( "#submenu" ).slideToggle( "slow", function() {

  });
	});
});

	</script>
	<style type="text/css">
		
#item {
 background-color: #4CAF50;
 color: white;
 padding: 16px;
 font-size: 16px;
 border: none;
 cursor: pointer;
}
#item:hover, #item:focus {
 background-color: #3e8e41;
}
.menu {
 position: relative;
 display: inline-block;
}
#submenu {
 display: none;
 position: absolute;
 background-color: #3e8e41;
 min-width: 160px;
 box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
}
#submenu a {
 color: white;
 padding: 12px 16px;
 text-decoration: none;
 display: block;
}
#submenu a:hover {
 background-color: #4CAF50

}
	</style>
</head>
<body>
<?php 
if($_GET) {
	if ($_GET["status"] == 1) {
		echo "Registed";
		echo "<br><br><h1>Welcome</h1><br>";
		if (isset($_SESSION["username"])) {
		echo "<h1>" .$_SESSION["username"]. " " .$Greeting. "</h1>";
	}
		}
	else{		
		echo "Logined<br>";
		echo $_SESSION["username"];
		echo "<br><br><h1>Welcome</h1><br>";
	}
}

?>

<div class = "menu">
	<div id = "item">Drop-Down</div>
	<div id = "submenu">
		<a href="table.php">Users</a>
		<a href="weather.html">Get weather!</a>
		<a href="logout.php">Logout</a>
	</div>
</div>		

<!-- <?php	
// echo "<a href ='table.php'><button>Admin page</button></a>";
// echo "<a href = 'weather.html'><button>Get weather!</button></a><br><br>";
// echo "<a href ='logout.php'>Logout</a><br>";
?> -->
</body>
</html>