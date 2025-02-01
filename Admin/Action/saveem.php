<?php
$cnn = new mysqli("localhost", "root", "", "shop_project");
if ($cnn->connect_error) {
    die(json_encode(['error' => "Connection failed: " . $cnn->connect_error]));
}

$edit = $_POST['txt-edit'];
$fullname = $cnn->real_escape_string($_POST['txt-fullname']);
$phone = $cnn->real_escape_string($_POST['txt-ph']);
$email = $cnn->real_escape_string($_POST['txt-od']);
$passwords = $cnn->real_escape_string($_POST['txt-pass']);
$txtselect = $cnn->real_escape_string($_POST['txt-select']);
$photo = $cnn->real_escape_string($_POST['txt-photo']);

$res = ['edit' => false];

// Check for duplicate name
$stmt = $cnn->prepare("SELECT 1 FROM users WHERE UsersName = ? AND Id != ?");
$stmt->bind_param("si", $fullname, $edit);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    $res['dpl'] = true;
} else {
    $res['dpl'] = false;
    if ($edit == 0) {
        // Insert new record
        $stmt = $cnn->prepare("INSERT INTO users (UsersName, email, password, status, Photo, Create_at, phone) 
                               VALUES (?, ?, ?, ?, ?, NOW(), ?)");
        $stmt->bind_param("ssssss", $fullname, $email, $passwords, $txtselect, $photo, $phone);

        if ($stmt->execute()) {
            $res['id'] = $cnn->insert_id;
        } else {
            $res['error'] = "Insert failed: " . $stmt->error;
        }
    } else {
        // Update existing record
        $stmt = $cnn->prepare("UPDATE users SET UsersName = ?, email = ?, status = ?, Photo = ?, phone = ? WHERE Id = ?");
        $stmt->bind_param("sssssi", $fullname, $email, $txtselect, $photo, $phone, $edit);

        if ($stmt->execute()) {
            $res['edit'] = true;
            $res['id'] = $edit;
        } else {
            $res['error'] = "Update failed: " . $stmt->error;
        }
    }
}

$stmt->close();
$cnn->close();

echo json_encode($res);
