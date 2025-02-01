<?php
$cnn = new mysqli("localhost", "root", "", "shop_project");

if ($cnn->connect_error) {
    echo ("Connection failed: " . $cnn->connect_error);
}
$tbl = array("tbl_slide","tbl_category","tbl_subcategory");
$opt = $_POST['opt'];
$sql = "SELECT Id FROM $tbl[$opt] ORDER BY Id DESC";
$result = $cnn->query($sql);
$num = $result->num_rows;
// $res = array();
if ($num > 0) {
    $row = $result->fetch_array();
    $res['id'] = $row[0] + 1;
} else {
    $res['id'] = 1;
}

echo json_encode($res);
?>
