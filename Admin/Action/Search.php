<?php
$cnn = new mysqli("localhost", "root", "", "shop_project");
if ($cnn->connect_error) {
    echo json_encode(['error' => 'Database connection failed']);
    exit();
}


$searchQuery = $_POST['Search'];


$sql = "SELECT * FROM tbl_slide WHERE Name LIKE '%$searchQuery%' ORDER BY Id DESC";
$result = $cnn->query($sql);

$response = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $response[] = $row;
    }
}

echo json_encode($response);
?>
