<?php
require_once('database.php');
session_start();



// turn on the output buffers.
// ob_start();
// print_r();
// var_dump();

if ($_POST) {
	if(isset($_POST['username'])) {
		$_SESSION['email'] = $_POST['email'];
		$_SESSION['password'] = MD5($_POST['password'] . $_POST['email']); // improving MD5
		$_SESSION['username'] = $_POST['username'];
		
		// call reCAPTCHA
		// require('recaptcha.php');

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
	else {
		$_SESSION['email'] = $_POST['email'];
		$_SESSION['password'] = MD5($_POST['password'] . $_POST['email']);

		// call reCAPTCHA
		// require('recaptcha.php');
		
		// login
		$result = mysqli_query($connection,"SELECT * from users WHERE Email='".$_SESSION['email']."' and Password='".$_SESSION['password']."'");

//ee56e204c4febd82c6c79961af54b6b5
		// if user has not been found redirect to enter.php
		if(mysqli_num_rows($result)!=1){ 

    			Header("Location: http://localhost:8888/PHP-learning/enter.php");
    			die;
    		}


    	$_SESSION['username'] = mysqli_fetch_array($result)[1]; //index 1 because of column Username is 2nd in Users table
		Header("Location: http://localhost:8888/PHP-learning/index.php?status=2", true, 301);
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Entering form</title>
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
		<!-- <div class="g-recaptcha" data-sitekey="6Leo50oUAAAAAGpbjhcGWymaR9OY37MjIBBFuDNd"></div> -->
		<br>
		<input type="submit" name="submit">
	</form>

	<h1>Login</h1>
	<form  method="POST" id="login_form" action="enter.php">
		<input class = "emailLog" type="email" name="email" placeholder="email">
		<br><br>
		<input class = "passLog" type="password" name="password" placeholder="password">
		<br><br>
		<div class="g-recaptcha" data-sitekey="6Leo50oUAAAAAGpbjhcGWymaR9OY37MjIBBFuDNd"></div>
		<br><br>
		<input type="submit" name="submit">
	</form>

	<script type="text/javascript">
		
		$("#login_form").submit(function(event) {
		   var recaptcha = grecaptcha.getResponse()
		   if (recaptcha == "") {
		      event.preventDefault();
		      alert("Please check the recaptcha");
		   }
		});



	</script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script type="text/javascript" src= "JS.js"></script>
	<script type="text/javascript" 	src='https://www.google.com/recaptcha/api.js'></script>

</body>
</html>