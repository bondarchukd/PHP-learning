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
	<script src="JS.js"></script>
	<style src="CSS.css"></style>
</head>
<body>
<h1 class ="todo">My To Do list</h1>
<input type="text" placeholder="New item">
<button id = "add">Add</button>
<ol id"mylist"></ol>
</body>
</html>