<?php 
// echo "success";
$email = $_POST["email"];
$password = $_POST["password"];
$username = $_POST["username"];

$connection = mysqli_connect("sql131.main-hosting.eu","u386269602_root","dbondarchuk1","u386269602_test");
$result = mysqli_query($connection,"insert into Users (Username, Password, Email) values ('$username','$password', '$email')");

echo $result;
echo "success";
// header("Location: http://hs.com/filearray.php/");

?>