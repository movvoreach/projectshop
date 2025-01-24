<?php
$cnn = new mysqli("localhost", "root", "", "shop_project");
$e = $_POST['opt'];
$s = $_POST['s'];
$sql = "SELECT * FROM tbl_slide  ORDER BY Id DESC limit $s,$e";
$result = $cnn->query($sql);
$num = $result->num_rows;
// $data = array();
$res = array(); // Initialize $res as an empty array
if ($num > 0) {
    while ($row = $result->fetch_array()) {
        $res[] = array(
            'id' => $row[0],
            'name' => $row[1],
            'photo' => $row[2],
            'od' => $row[3],
            'status' => $row[5]
        );
    }
}


echo json_encode($res);
