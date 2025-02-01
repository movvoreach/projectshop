<?php
$cnn = new mysqli("localhost", "root", "", "shop_project");
$e = $_POST['opt'];
$s = $_POST['s'];
$sql = "SELECT * FROM tbl_customer ORDER BY Id DESC limit $s,$e";
$result = $cnn->query($sql);
$num = $result->num_rows;
// $data = array();
$res = array(); // Initialize $res as an empty array
if ($num > 0) {
    while ($row = $result->fetch_array()) {
        $res[] = array(
            'id' => $row[0],
            'usersname' => $row[1],
            'phone' => $row[2],
            // 'address' => $row[6],
            'email' => $row[3],
             'Address' => $row[6],
            'Create_at' => $row[5]
        );
    }
}


echo json_encode($res);
