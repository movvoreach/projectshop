<?php
$cnn = new mysqli("localhost", "root", "", "shop_project");
if ($cnn->connect_error) {
    echo ("Connection failed: " . $cnn->connect_error);
    exit();
}

$id = $_POST['txt-ID'];
$cate = $_POST['txt-cate'];
$name = $_POST['txt-Name'];
$od = $_POST['txt-od'];
$status = $_POST['txt-select'];
$name_link = $name; 
$photo = $_POST['txt-photo'];
$edit = $_POST['txt-edit'];

// Check for duplicate name
$sql = "SELECT * FROM tbl_subcategory WHERE Name = '$name' && Id != $edit";
$result = $cnn->query($sql);
$num = $result->num_rows;
$res['edit'] = false;

if ($num > 0) {
    $res['dpl'] = true;
} else {
   if($edit == 0){
    $res['dpl'] = false;
    // Insert the new record
    $sql = "INSERT INTO tbl_subcategory (cat_id,Name, Photo, OD, Name_Link, Status) VALUES ('$cate','$name', '$photo', '$od', '$name_link', '$status')";
    $cnn->query($sql);  // Get the last inserted ID
    $res['id'] = $cnn->insert_id;
   }else{
    $res['edit'] = true;
    // Update the record
    $sql = "UPDATE tbl_subcategory SET cat_id='$cate', Name='$name', Photo='$photo', od='$od', Status='$status' WHERE Id=$edit";
    $cnn->query($sql);  // Get the last inserted ID
    $res['id'] = $edit;
   }
}

echo json_encode($res);
?>
