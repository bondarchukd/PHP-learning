<?php

if ($_POST) {

$id = $_POST["add"];
require_once('database.php');
require_once('check_enter.php');
// session_start();
$result = mysqli_query($connection,"INSERT INTO todo (TODO, DATE) VALUES (
	'" .$_POST["add"]. "',
	'now()')"
);


// to read a connection error access the member properties
$connection->connect_errno;

// to read the error
print $connection->error; //https://stackoverflow.com/questions/23606591/php-mysqli-error-passing-boolean-as-parameter-1?rq=1

if ($result) {

	echo "successful!";
} 
else {	
	
	echo mysqli_error($result);
}
 
 if(!$result)
  {
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