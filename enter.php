<?php

require_once('database.php');
session_start();

if ($_POST) {
	if(isset($_POST['username'])) {
		$_SESSION['email'] = $_POST['email'];
		$_SESSION['password'] = MD5($_POST['password'] . $_POST['email']); // improving MD5
		$_SESSION['username'] = $_POST['username'];
		
		// check exist of email
		$userExists = mysqli_query($connection,"SELECT * from users WHERE Email = '".$_SESSION['email']."'");
		if(mysqli_num_rows($userExists==1)) {
			echo "This email has already been registered";
			die();
		}

		// registration
		$result = mysqli_query($connection,"INSERT INTO users (USERNAME, PASSWORD, EMAIL) VALUES(
			'".$_SESSION['username']. ",
			'".$_SESSION['password']."',
			'".$_SESSION['email']."')"
		);

		Header('Location: http://localhost:8888/PHP-learning/index.php?status=1', true, 301);
	}
	else {
		$_SESSION['email'] = $_POST['email'];
		$_SESSION['password'] = MD5($_POST['password']); // . $_POST['email'])

		// start reCAPTCHA
		$response = $_POST["g-recaptcha-response"];
		$url = 'https://www.google.com/recaptcha/api/siteverify';
		$data = array(
			'secret' => '6Leo50oUAAAAAKuuZbYI28J1P59Jcaf3AgQYH09b',
			'response' => $_POST["g-recaptcha-response"]
		);
		$options = array(
			'http' => array (
				'method' => 'POST',
				'content' => http_build_query($data)
			)
		);
		$context  = stream_context_create($options);
		$verify = file_get_contents($url, false, $context);
		$captcha_success=json_decode($verify);
		if ($captcha_success->success==false) {
			echo "<p>You are a bot! Go away!</p>";
		} else if ($captcha_success->success==true) {
			echo "<p>You are not not a bot!</p>";
		}
		// end of reCAPTCHA

		// login
		$result = mysqli_query($connection,"SELECT * from users WHERE Email='".$_SESSION['email']."' and Password='".$_SESSION['password']."'");


		// if user has not been found redirect to enter.php
		if(mysqli_num_rows($result)!=1){ 
    			Header("Location: http://localhost:8888/PHP-learning/enter.php");
    			die();
    		}

    	$_SESSION['username'] = mysqli_fetch_array($result)[1]; //index 1 because of column Username is 2nd in Users table
		Header('Location: http://localhost:8888/PHP-learning/index.php?status=2', true, 301);
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Entering form</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src= "JS.js"></script>
	<script src='https://www.google.com/recaptcha/api.js'></script>	
</head>
<body>
	
	<h1>Registration</h1>
	<form method="POST" action="enter.php">
		<input onkeyup="check_reg()" class = "emailReg" type="email" name="email" placeholder="email">
		<br><br>
		<input onkeyup ="check_reg()" class = "passReg" type="password" name="password" placeholder="password">
		<br><br>
		<input onkeyup="check_reg()" class = "passReg" type="password" name="passwordCheck" placeholder="password"><br><br>
		<input class = "userReg" type="text" name="username" placeholder="David">
		<br><br>
		<div class="captcha_wrapper">
		<div class="g-recaptcha" data-sitekey="6Leo50oUAAAAAGpbjhcGWymaR9OY37MjIBBFuDNd"></div>
		</div>
		<br>
		<button type="submit" name="submit">Sign up</button>
	</form>

	<h1>Login</h1>
	<form method="POST" action="enter.php">
		<input class = "emailLog" type="email" name="email" placeholder="email">
		<br><br>
		<input class = "passLog" type="password" name="password" placeholder="password">
		<br><br>
		<div class="captcha_wrapper">
		<div class="g-recaptcha" data-sitekey="6Leo50oUAAAAAGpbjhcGWymaR9OY37MjIBBFuDNd"></div>
		</div><br><br>
		<button type="submit" name="submit">Sign in</button>
	</form>
	
</body>
</html>