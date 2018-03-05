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
	<!-- <script src="JS.js"></script> -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script type="text/javascript">
		$(function() {
	$("#add").on("click", function()
{
	var val = $("input").val();
	if(val!== '') {
		var elem = $("<li></li>").text(val);
		$(elem).append("<button class='rem'>X</button>");
		$("mylist").append(elem);
		$("input").val("");
		$(".rem").on("click"), function() {
			$(this).parent().remove();
		};
}
});
});
	</script>
	<style src="CSS.css"></style>
</head>
<body>
<h1 class ="todo">My To Do list</h1>
<input type="text" placeholder="New item">
<button id = "add">Add</button>
<ol id"mylist"></ol>
</body>
</html>