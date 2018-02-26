<?php

$connection = mysqli_connect("mysql.j820528.myjino.ru", "j820528", "dbondarchuk1", "j820528_test");

if (isset($connection)) {
	echo ' Status: connected <br>';
}

?>