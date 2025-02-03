<?php

$cnn = new mysqli("localhost", "root", "", "shop_project");
// count tada
$tbl = array("tbl_slide","tbl_category","users",'tbl_customer','tbl_subcategory','tbl_product');
$opt = $_POST['opt'];
$sql = "SELECT COUNT(*) as total FROM $tbl[$opt] ";
$result = $cnn->query($sql);
$res['total'] = 0;
if($result->num_rows > 0){
    $row = $result->fetch_array();
    $res['total'] = $row[0];
 }
echo json_encode($res);

