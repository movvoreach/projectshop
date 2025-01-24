<?php
$cnn = new mysqli("localhost", "root", "", "shop_project");
// $id = $_POST['id'];
$sql = "SELECT * FROM users ";
$result = $cnn->query($sql);
$num = $result->num_rows;
// $data = array();
$res = array(); // Initialize $res as an empty array
if ($num > 0) {
    while ($row = $result->fetch_array()) {
        $res[] = array(
            'id' => $row[0],
            'email' => $row[2],
            'passwords' => $row[3],
            'status' => $row[4]
        );
    }
}


echo json_encode($res);
