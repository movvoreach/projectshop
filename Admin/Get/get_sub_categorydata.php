<?php

$e = $_POST['opt'];
$s = $_POST['s'];
$cnn = new mysqli("localhost", "root", "", "shop_project");

// Check connection
if ($cnn->connect_error) {
    die("Connection failed: " . $cnn->connect_error);
}

$sql = "SELECT tbl_subcategory.Id, tbl_subcategory.cat_id, tbl_category.Name, tbl_subcategory.name, tbl_subcategory.photo, tbl_subcategory.od, tbl_subcategory.status 
        FROM tbl_subcategory 
        INNER JOIN tbl_category ON tbl_subcategory.cat_id = tbl_category.Id 
        ORDER BY tbl_subcategory.Id DESC 
        LIMIT $s,$e";

$result = $cnn->query($sql);

$res = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $res[] = array(
            'id' => $row['Id'],
            'cate_id' => $row['cat_id'],
            'cate_name' => $row['Name'],
            'name' => $row['name'],
            'photo' => $row['photo'],
            'od' => $row['od'],
            'status' => $row['status']
        );
    }
    echo json_encode($res);
} else {
    echo json_encode(array('error' => 'No data found'));
}

$cnn->close();
?>
