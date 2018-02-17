<?php
require 'session.php';

echo "<h1> Database structure below</h1>";

$connection = mysqli_connect("mysql.j820528.myjino.ru", "j820528", "dbondarchuk1",  "j820528_test");
$query = "select * from users";
$result = mysqli_query($query);

echo "<table>Table should be instead of this text<br>";

while($row = mysqli_fetch_array($result)) {

	echo "<tr><td>" . $row['username'] . "</td><td>" . $row['email'] . "</td></tr>";
}

echo "</table>";
mysqli_close($connection);

echo "<a href='logout.php'>Logout</a>";	


		
?>