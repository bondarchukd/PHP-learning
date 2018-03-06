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

	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script type="text/javascript" src="JS.js"></script>
	
	<link rel = "stylesheet" type = "text/css" href = "CSS.css">
</head>
<body>
<h1 class ="todo">My To Do list</h1>

<!-- Drop-Down menu -->
<?php
require('dropdown.html');
?>

<!-- input for adding new item -->
<input type="text" placeholder="New item">
<button id = "add">Add</button>
<ol id"mylist"></ol>
</body>

<!-- script for adding new item -->
<script type="text/javascript">
		$(document).ready(function() {
	$("#add").on("click", function()
{
	var val = $("input").val();
	if(val!== '') {
		var elem = $("<li></li>").text(val);
		$(document).ready(function(){
		$(elem).append("<button class='rem'>X</button>");
		$("mylist").append(elem);
		$("input").val("");
		$(".rem").on("click"), function() {
			$(this).parent().remove();
		};
	});
}
});
});
	</script>
</html>