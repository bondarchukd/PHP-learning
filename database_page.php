<?php
session_start();
$connection = mysqli_connect("mysql.j820528.myjino.ru", "j820528", "dbondarchuk1", "j820528_test");

// connection checking
if (isset($connection)) {
	echo 'Connected';
}

echo "<h1> Database structure below</h1>";
echo "<table>
		<caption>Users</caption>
		<tr>
			<th>Username</th>
			<th>Email</th>
		</tr>
		<tr><td>Here should be shown result of SQL request</td></tr>";
echo "<a href='logout.php'>Logout</a>";	

// CREATE NEW FILE

$fp = fopen('users.txt', "w");
$query = mysqli_query($connection, "select * from users");
// $mytext = $query;
$mytext = "string to be written\r\n";
$test = fwrite($fp, $mytext);
if($test) echo "Data has been added";
else echo "Error!";
fclose($fp);

		
?>