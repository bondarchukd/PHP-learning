<?php
// http://form.guide/php-form/php-login-form.html
// https://claytonjohnson.com/create-a-portfolio-client-area-using-php-and-mysql-part-3
// https://www.ibm.com/developerworks/ru/library/os-phpajax/ - tutorial about building php page
require_once('database.php');
session_start();

if ($_POST) {

		$_SESSION['email'] = $_POST['email'];
		$_SESSION['password'] = MD5($_POST['password'] . $_POST['email']);
		
		// login
		$result = mysqli_query($connection,"SELECT * from users WHERE Email='".$_SESSION['email']."' and Password='".$_SESSION['password']."'");

		//ee56e204c4febd82c6c79961af54b6b5
		// if user has not been found redirect to enter.php
		if(mysqli_num_rows($result)!=1){ 

    			Header("Location: http://localhost:8888/PHP-learning/login.php");
    			die;
    		}

    	$_SESSION['username'] = mysqli_fetch_array($result)[1]; //index 1 because of column Username is 2nd in Users table
		Header("Location: http://localhost:8888/PHP-learning/index.php?status=2", true, 301);
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Login form</title>
	<script src="https://www.google.com/recaptcha/api.js" async defer></script>
	<meta charset="utf-8">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" type="text/javascript" href="js.js">

</head>
<body>
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
	<br>
	<br>
	<a href ="registration.php">Sign up</a>

<!-- reCaptcha -->
	<script type="text/javascript">
		
		$("#login_form").submit(function(event) {
		   var recaptcha = grecaptcha.getResponse()
		   if (recaptcha == "") {
		      event.preventDefault();
		      alert("Please check the recaptcha");
		   }
		});

	</script>
</body>
</html>

