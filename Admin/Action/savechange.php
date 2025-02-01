<?php
$cnn = new mysqli("localhost", "root", "", "shop_project");
if ($cnn->connect_error) {
    die("Connection failed: " . $cnn->connect_error);
}
$edit = $_POST['txt-edit'];
$fullname = $_POST ['txt-fullname'];
$phone = $_POST['txt-ph'];
$email = $_POST['txt-Email'];
$passwords=$_POST['txt-pass'];
 $txtselect = $_POST['txt-select'];
// $photo = $_POST['txt-photo'];

// Check if Duplicate email
$sql = "SELECT * FROM tbl_customer WHERE usersname = '$fullname' && Id != $edit";
$result = $cnn->query($sql);
$num = $result->num_rows;
$res['edit'] = false;

if ($num > 0) {
    $res['dpl'] = true;
}else {
    if ($edit == 0){
        $sql = "INSERT INTO `tbl_customer`(`usersname`, `Phone`, `email`, `password`,`Create_at`,`Address`) VALUES ('$fullname','$phone','$email','$passwords',Now(),' $txtselect')";
        $cnn->query($sql);  // Get the last inserted ID
        $res['id'] = $cnn->insert_id;
    }else {
        $sql = "UPDATE tbl_customer SET usersname = '$fullname', Phone = '$phone', email = '$email', password = '$passwords', Address = '$txtselect' WHERE Id = $edit";
        if ($cnn->query($sql) === TRUE) {
            $res['edit'] = true;
        } else {
            echo "Error updating record: ". $cnn->error;
        }
    }
}

// $sql = "INSERT INTO `tbl_customer`(`usersname`, `Phone`, `email`, `password`,`Create_at`,`Address`) VALUES ('$fullname','$phone','$email','$passwords',Now(),' $txtselect')";

// if ($cnn->query($sql) === TRUE) {
//     echo "New record created successfully";
// }else{
//     echo "Error: ". $sql. "<br>". $cnn->error;
// }
echo json_encode($res);
?>