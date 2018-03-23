<?php 

require_once('database.php');
$email = $_GET['email'];
$unic = $_GET['unic']; //unical code (made using uniqid(rand()))

// make query to DB for checking unic exists 
$res = mysqli_query($connection,"SELECT * from users WHERE EMAIL = '".$email."' and Unic_Email_Token = '".$unic."'");

// if unic record exists change flag in Email_OK column from NO to OK
		if(mysqli_num_rows($res) == 1) {
			$active = mysqli_query($connection,"UPDATE users SET  Email_OK = 'YES' WHERE Email = '".$email."'");

		}
echo "Email confirmed!";

Header('Location: http://localhost:8888/PHP-learning/index.php?status=1', true, 301);
// URL for cheking:

// link to send email:
// http://localhost:8888/PHP-learning/mail.php?email=dbondarchuk@gmail.com

// link to activate from email:
// http://localhost:8888/PHP-learning/activate.php?email=dbondarchuk@gmail.com&unic=228a89937281ee5d62bd843696fdb2bf 
?>