<?php 
session_start();
$cnn = new mysqli("localhost", "root", "", "shop_project");

if ($cnn->connect_error) {
    die("Connection failed: " . $cnn->connect_error);
}

$username =  $_POST["username"];
$email = $_POST['email'];
$password = $_POST['password'];
//$role = $_POST['role'];


$sql = "INSERT INTO `users`(`Id`, `Name`, `email`, `password`, `status`) VALUES (null, '$username', '$email', '$password','1 ')";
if ($cnn->query($sql) === TRUE) {
    echo json_encode(["status" => "success", "message" => "Registration successful"]);
} else {
    echo json_encode(["status" => "error", "message" => "Error: " . $cnn->error]);
}
?>