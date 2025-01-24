<?php
$cnn = new mysqli("localhost", "root", "", "shop_project");

// Check database connection
if ($cnn->connect_error) {
    die(json_encode(['delete' => false, 'error' => $cnn->connect_error]));
}
$tbl = array("tbl_slide","tbl_category");
$opt = $_POST['opt'];

// Retrieve the ID from the POST request
$id = $_POST['id'] ?? null; // Use lowercase 'id' to match JavaScript

$res = [];

// Validate and execute the query
if ($id) {
    $sql = "DELETE FROM $tbl[$opt] WHERE Id = $id";
    if ($cnn->query($sql) === TRUE) {
        $res['delete'] = true; // Deletion was successful
    } else {
        $res['delete'] = false; // Deletion failed
        $res['error'] = $cnn->error; // Include error for debugging
    }
} else {
    $res['delete'] = false;
    $res['error'] = 'Invalid ID';
}

// Close the connection
$cnn->close();

// Return response as JSON
echo json_encode($res);
?>
