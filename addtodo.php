<?php

if ($_POST) {

$id = $_POST["add"];
$text = $_POST["textS"];

require_once('database.php');
require_once('check_enter.php');

$result = mysqli_query($connection,"INSERT INTO todo (TODO) VALUES (
	'$text')"
);

// to read a connection error access the member properties
$connection->connect_errno;

// to read the error
print $connection->error;


if ($result) {

	echo "successful!";
} 
else {	
	
	echo mysqli_error($result);
}
 
if(!$result) {

    var_dump($result);
    $message = mysqli_error($result);

    echo "$message";
    echo "</body>";
    echo "</html>";

die();
 }

}

echo "<br><a href = 'todo.php'><button>Back</button></a><br><br>";

?>