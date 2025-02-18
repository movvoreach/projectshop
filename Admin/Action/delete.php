<?php
$cnn = new mysqli("localhost", "root", "", "shop_project");

// Check database connection
if ($cnn->connect_error) {
    die(json_encode(['delete' => false, 'error' => $cnn->connect_error]));
}

$tbl = array("tbl_slide","tbl_category","users","tbl_customer","tbl_subcategory","tbl_product");
$opt = $_POST['opt'] ?? null;

// Validate the table index and ID
if (isset($tbl[$opt]) && isset($_POST['id'])) {
    $id = (int)$_POST['id']; // Ensure $id is an integer
    $table = $tbl[$opt]; // Get the table name

    // Prepare the SQL statement to prevent SQL injection
    $stmt = $cnn->prepare("DELETE FROM $table WHERE Id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        $res['delete'] = true; // Deletion was successful
    } else {
        $res['delete'] = false;
        $res['error'] = $stmt->error; // Include error for debugging
    }

    $stmt->close(); // Close the statement
} else {
    $res['delete'] = false;
    $res['error'] = 'Invalid ID or Table';
}

$cnn->close(); // Close the connection

// Return response as JSON
echo json_encode($res);
?>
