<?php 
// echo "success";
$email = $_POST["email"];
$password = $_POST["password"];

$connection = mysqli_connect("sql131.main-hosting.eu","u386269602_root","dbondarchuk1","u386269602_test");
$result = mysqli_query($connection,"insert into Users (Password, Email) values ('$password', '$email')");

echo $result;
echo "success";
// header("Location: http://hs.com/filearray.php/");

?>