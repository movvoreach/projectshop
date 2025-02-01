<?php
$cnn = new mysqli("localhost", "root", "", "shop_project");
$e = $_POST['opt'];
$s = $_POST['s'];
$sql = "SELECT * FROM users  ORDER BY Id DESC limit $s,$e ";
$result = $cnn->query($sql);
$num = $result->num_rows;
// $data = array();
$res = array(); // Initialize $res as an empty array
if ($num > 0) {
    while ($row = $result->fetch_array()) {
        $res[] = array(
           'Id' => $row[0],
            'photo' => $row[5],
            'usersname' => $row[1],
            'phone' => $row[7],
            'email' => $row[2],
            'status' => $row[4],
            'create_date' => $row[6]

        );
    }
}


echo json_encode($res);
