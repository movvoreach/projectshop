<?php
$cnn = new mysqli("localhost", "root", "", "shop_project");
// $e = $_POST['opt'];
// $s = $_POST['s'];
$sql = "SELECT * FROM users  ORDER BY Id DESC ";
$result = $cnn->query($sql);
$num = $result->num_rows;
// $data = array();
$res = array(); // Initialize $res as an empty array
if ($num > 0) {
    while ($row = $result->fetch_array()) {
        $res[] = array(
            'id' => $row[0],
            'usersname' => $row[1],
            'email' => $row[2],
            'status' => $row[4]
        );
    }
}


echo json_encode($res);
