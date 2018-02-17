<?php

// CREATE NEW FILE

$fp = fopen('users.txt', "w");
$query = mysqli_query($connection, "select * from users");
// $mytext = $query;
$mytext = "string to be written\r\n";
$test = fwrite($fp, $mytext);
if($test) echo "Data has been added";
else echo "Error!";
fclose($fp);

?>