<!-- https://www.kaplankomputing.com/blog/tutorials/recaptcha-php-demo-tutorial/ -->

<?php
	$sender_name = stripslashes($_POST["sender_name"]);
	$sender_email = stripslashes($_POST["sender_email"]);
	$sender_message = stripslashes($_POST["sender_message"]);
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

?>

<!DOCTYPE html>
<html>
<head>
	<title>reCAPTCHA</title>
	<script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body>
<form action="recaptcha.php" method="post" enctype="multipart/form-data">
	<input name="sender_name" placeholder="Your Name..."/>
	<input name="sender_email" placeholder="Your email..."/>
	
        <div class="captcha_wrapper">
		<div class="g-recaptcha" data-sitekey="6Leo50oUAAAAAGpbjhcGWymaR9OY37MjIBBFuDNd"></div>
	</div>
	<button type="submit" id="send_message">Send Message!</button>
</form>
</body>
</html>
