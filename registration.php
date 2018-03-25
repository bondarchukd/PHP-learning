<!-- SEPARATE PAGE FOR REGISTRATION -->
<?php
require('database.php');
// session_start();

if($_POST) {
	if(isset($_POST['username'])) {
		$_SESSION['email'] = $_POST['email'];
		$_SESSION['password'] = MD5($_POST['password'] . $_POST['email']); // improving MD5
		$_SESSION['username'] = $_POST['username'];

		// check exist of email
		$userExists = mysqli_query($connection,"SELECT * from users WHERE Email = '".$_SESSION['email']."'");
		if(mysqli_num_rows($userExists) == 1) {
			echo "<p><b>This email has already been registered!</b><p>";
			die();
		}

		// registration
		$result = mysqli_query($connection,"INSERT INTO users (USERNAME, PASSWORD, EMAIL) VALUES(
			'" .$_SESSION['username']. "',
			'" .$_SESSION['password']."',
			'" .$_SESSION['email']."')"
		);

		Header('Location: http://localhost:8888/PHP-learning/index.php?status=1', true, 301);
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Registration form</title>
	<script src="https://www.google.com/recaptcha/api.js" async defer></script>
	<meta charset="utf-8">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" type="text/javascript" href="js.js">

</head>
<body>
	
	<h1>Registration</h1>
	<form method="POST" id="format" action="enter.php">
		<input onkeyup="check_reg()" class = "emailReg" type="email" name="email" placeholder="email">
		<br><br>
		<input onkeyup ="check_reg()" class = "passReg" type="password" name="password" placeholder="password">
		<br><br>
		<input onkeyup="check_reg()" class = "passReg" type="password" name="passwordCheck" placeholder="password"><br><br>
		<input class = "userReg" type="text" name="username" placeholder="David">
		<br><br>
		<div class="g-recaptcha" data-sitekey="6Leo50oUAAAAAGpbjhcGWymaR9OY37MjIBBFuDNd"></div>
		<br><br>
		<input type="submit" name="submit">
	</form>
	<br>
	<br>
	<a href ="login.php">Sign in</a>

<!-- reCaptcha -->
	<script type="text/javascript">
		
		$("#format").submit(function(event) {
		   var recaptcha = grecaptcha.getResponse()
		   if (recaptcha == "") {
		      event.preventDefault();
		      alert("Please check the recaptcha");
		   }
		});

	</script>

</body>
</html>



