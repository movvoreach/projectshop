<?php
$file = $_FILES['txt-photo']; 
$tmp = $file['tmp_name']; 
$img_name = $file['name']; 
$ext = pathinfo($img_name, PATHINFO_EXTENSION);  // Extract file extension (e.g., png, jpg)
$t = time();  // Current timestamp
$newName = $t . mt_rand(100000, 999999);  // Unique name generation

// Define new file path with the correct name and extension
$newFileName = $newName . '.' . $ext;  
$uploadPath = "../img/" . $newFileName;  

// Move the uploaded file to the destination folder
if (move_uploaded_file($tmp, $uploadPath)) {
    $msg['success'] = true;
    $msg['imgName'] = $newFileName;
    $msg['imgPath'] = $uploadPath;
} else {
    $msg['success'] = false;
    $msg['error'] = "File upload failed.";
}

// Return JSON response
echo json_encode($msg);
?>
