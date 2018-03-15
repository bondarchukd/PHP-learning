<?php 

require_once('database.php');
$email = $_GET['email'];
$unic = $_GET['unic'];


$res = mysqli_query($connection,"SELECT * from users WHERE EMAIL = '".$email."' and Unic_Email_Token = '".$unic."'");
		if(mysqli_num_rows($res) == 1) {
			$active = mysqli_query($connection,"UPDATE users SET  Email_OK = 'YES' WHERE Email = '".$email."'");

		}

?>