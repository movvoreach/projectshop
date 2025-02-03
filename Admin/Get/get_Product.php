<?php

$cnn = new mysqli("localhost", "root", "", "shop_project");
$e = $_POST['opt'];
$s = $_POST['s'];
$sql = "SELECT * FROM tbl_product ORDER BY Id DESC limit $s,$e";
$result = $cnn->query($sql);
$num = $result->num_rows;

$data = array();

if ($num > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    echo json_encode($data);
}
