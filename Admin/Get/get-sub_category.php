<?php
// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Database connection
$cnn = new mysqli("localhost", "root", "", "shop_project");
if ($cnn->connect_error) {
    die("Connection failed: " . $cnn->connect_error);
}

// Get the category ID from POST data
$cat_id = $_POST['id'];

// Use prepared statements to prevent SQL injection
$sql = "SELECT Id, name FROM tbl_subcategory WHERE status = '1' AND cat_id = ? ORDER BY Id DESC LIMIT 0, 2000";
$stmt = $cnn->prepare($sql);
if ($stmt) {
    $stmt->bind_param("i", $cat_id); // Bind the parameter
    $stmt->execute();
    $result = $stmt->get_result();

    $res = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $res[] = array(
                'id' => $row['Id'],
                'name' => $row['name']
            );
        }
    }
    echo json_encode($res); // Return JSON response

    $stmt->close();
} else {
    echo json_encode(array('error' => 'Failed to prepare SQL statement'));
}

$cnn->close();
?>