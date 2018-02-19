<?php
// check session
require 'session.php';

// CREATE GREETING DEPENDS ON CURRENT TIME BELOW
// Setting default time zone
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
echo "<h1>".$Greeting."</h1>";
echo "<h3>You have been registered successfuly</h3>";
echo "Welcome " . $_SESSION['login'] . "! <br>";
echo "<a href ='database_page.php'><button>Admin page</button></a>";
echo "<a href = 'weather.html'><button>Get weather!</button></a><br><br>";
echo "<a href ='logout.php'>Logout</a><br>";
// }


?>