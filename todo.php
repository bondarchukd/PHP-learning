<?php
// https://blog.devcenter.co/easy-way-to-php-todolist-app-crud-e1284265bb27 - TO DO LIST
require_once('database.php');
session_start();

if (!isset($_SESSION['email']) && !isset($_SESSION['password'])) {

    header('Location: login.php');
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>My To-Do list</title>
	<!-- JQUERY -->
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<!-- <script type="text/javascript" src = "JS.js"></script> -->
	<!-- TO DO list embed script -->
	<script type="text/javascript">
	$(function() {
	$("#add").on("click", function()
{
	var val = $("input").val();
	if(val!== '') {
		var elem = $("<li></li>").text(val);
		$(elem).append("<button class='rem'>X</button>");
		$("#mylist").append(elem);
		$("input").val("");
		$(".rem").on("click"), function() {
			$(this).parent().remove();
		};
		
}
});
});
</script>	
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
<form action = "addtodo.php" method="post">
<input type="text" placeholder="New item">
<button id = "add" name = "add" type = "submit">Add</button>
</form>
<ol id="mylist"></ol>
</body>
<footer>
	<?php include 'footer.php' ?>
</footer>
</html>