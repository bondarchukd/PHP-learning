<?php 

function db_connect() {
	
	static $connection;

	if(!isset($connection)) {
		echo "connected";

		// $config = parse_ini_file('../Applications/MAMP/htdocs/PHP-learning/config.ini');
		$config = parse_ini_file('../config/config.ini');

		$connection = mysqli_connect($config['servername'],$config['username'],$config['password'],$config['dbname']);
	}

	if($connection === false) {

		return mysqli_connect_error();	
	}

	return $connection;
}

$connection = db_connect();
mysqli_query($connection,"SET NAMES 'utf8' ");
if ($connection->connect_error) {

	die("Connection failed: " . $connection->connect_error);
}