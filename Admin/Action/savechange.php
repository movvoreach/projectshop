<?php
$cnn = new mysqli("localhost", "root", "", "shop_project");
if ($cnn->connect_error) {
    die("Connection failed: " . $cnn->connect_error);
}

$email = $_POST['txt-Email'];
$passwords=$_POST['txt-passwords'];

$sql = "INSERT INTO INSERT INTO `users`( `email`, `password`) VALUES ('$email', '$passwords')";

if ($cnn->query($sql) === TRUE) {
    echo "New record created successfully";
}else{
    echo "Error: ". $sql. "<br>". $cnn->error;
}

?>