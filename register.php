<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname ="Register";
$id="";

$conn = mysqli_connect($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$birth = $_POST['birth'];
$sex = $_POST['sex'];

$sql = "INSERT INTO  NewUserRegistration(User_Name, User_Email, User_Phone, User_BD, User_Sex) 
VALUES ('$name', '$email', '$phone', '$birth', '$sex')";

$res = mysqli_query($conn, $sql);

if(!$res){
  die('Registration Faill '.mysqli_connect_error());
}
echo 'Registration successfull';

$conn -> close();

?>

