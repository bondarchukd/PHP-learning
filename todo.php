<?php
require_once('database.php');
session_start();

if (!isset($_SESSION['email']) && !isset($_SESSION['password'])) {

    header('Location: enter.php');
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>My To-Do list</title>
	<!-- JQUERY -->
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		
	<link rel = "stylesheet" type = "text/css" href = "CSS.css">
</head>
<body>
<h1 class ="todo">My To Do list</h1>

<!-- Drop-Down menu -->
<?php
require('dropdown.html');
?>

<br>

<!-- input for adding new item -->
<input type="text" placeholder="New item">
<button id = "add">Add</button>
<ol id"mylist"></ol>
</body>
</html>