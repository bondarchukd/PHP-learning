<!-- https://www.kaplankomputing.com/blog/tutorials/recaptcha-php-demo-tutorial/ -->

<?php
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
			// echo "<p>You are a bot! Go away!</p>";
			?> 
				<script type="text/javascript">
				alert("You are a bot! Go away!")</script>	
			
		<?php 
	} else if ($captcha_success->success==true) {
			echo "<p>You are not a bot!</p>";
			
		}
?>
