<?php

require_once('database.php');
require_once('check_enter.php');


if ($_GET) {

	$id = $_GET["id"];

	$result = mysqli_query($connection,"DELETE FROM todo
	WHERE ID = ".$id." ");

}

if ($_POST) {

$id = $_POST["add"];
$text = $_POST["textS"];

$result = mysqli_query($connection,"INSERT INTO todo (TODO) VALUES (
	'$text')"
);

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

		function deleteS(id) {
            $.get("http://localhost:8888/PHP-learning/todo.php?id="+id, function(data,status){
                location.reload()
            })
        }

	$(function() {
		$("#add").on("click", function() {
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
<form action = "todo.php" method="POST">
<input type="text" placeholder="New item" name="textS">
<input type="submit" name="add">
</form>
<ol id="mylist"></ol>

<?php
// Print list of todos
$sql = "SELECT * FROM todo ORDER BY DATE DESC";
$result = mysqli_query($connection, $sql);

while ($row = mysqli_fetch_assoc($result)) {
    echo "<li>".$row['TODO']."<button class='rem' onclick='deleteS(".$row['ID'].")'>X</button></li>";
}

?>

</body>
<footer>
	<?php include 'footer.php' ?>
</footer>
</html>