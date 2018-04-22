<?php
session_start();
function check(){
	// check user has logined and cash is right or not
	
$CC = db_connect();
	if (isset($_SESSION["username"]) && isset($_SESSION["password"])) {

		$result = mysqli_query($CC,"SELECT * from users WHERE Email='".$_SESSION['email']."' and Password='".$_SESSION['password']."'");

		if(mysqli_num_rows($result)!=1){    //such user does not exist
    		return 301;
    	}

    	return 200;
	} 

	return 301;
}

$result_enter = check();
if ($result_enter != 200) {
	Header("Location: http://localhost:8888/PHP-learning/login.php");
}

?>