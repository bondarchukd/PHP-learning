<?php


if ($_POST) {

$id = $_POST["add"];
require_once('database.php');
session_start();
$result = mysqli_query($connection,"INSERT INTO todo (TODO, DATE) VALUES (
	'" .$_POST["add"]. "',
	'now()')"
);

if ($result) {
// Header("Location: http://localhost:8888/PHP-learning/todo.php");
	echo "successful!";
} else {
	echo mysqli_error($result);
}
}

?>