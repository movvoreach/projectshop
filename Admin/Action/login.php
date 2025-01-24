<?php
session_start();
$cnn = new mysqli("localhost", "root", "", "shop_project");

if ($cnn->connect_error) {
    die("Connection failed: " . $cnn->connect_error);
}

$username = mysqli_real_escape_string($cnn, $_POST["username"]);
$password = mysqli_real_escape_string($cnn, $_POST["password"]);

// Use prepared statements to avoid SQL injection
$stmt = $cnn->prepare("SELECT * FROM users WHERE email = ? AND Password = ?");
$stmt->bind_param("ss", $username, $password);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Login successful
    $_SESSION['username'] = $username;


    echo "Login successful"; // Send success response
} else {
    // Login failed
    echo "Username or password is incorrect";
}

$stmt->close();
$cnn->close();
?>
