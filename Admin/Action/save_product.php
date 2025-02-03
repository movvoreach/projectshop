<?php
$cnn = new mysqli("localhost", "root", "", "shop_project");
if ($cnn->connect_error) {
    echo ("Connection failed: " . $cnn->connect_error);
    exit();
}
$id = $_POST['txt-ID'];
    $slide = $_POST['txt-slide'];
    $cate = $_POST['txt-cate'];
    $sub_cate = $_POST['txt-sub'];
    $des = $_POST['txt-des'];
    $price = $_POST['txt-price'];
    $price_dis = $_POST['txt-dis'];
    $price_after = $_POST['txt-price-dis'];
    $name = $_POST['txt-Name'];
    $click = 0;
    $uid = 1;
    $od = $_POST['txt-od'];
    $status = $_POST['txt-select'];
    $name_link = $name;
    $photo = $_POST['txt-img'];
    $edit = $_POST['txt-edit'];

    // Check for duplicate name
    $sql = "SELECT * FROM tbl_product WHERE Name = '$name' AND Id != $edit";
    $result = $cnn->query($sql);
    $num = $result->num_rows;
    $res = ['dpl' => false, 'edit' => false];

    if ($num > 0) {
        $res['dpl'] = true;
    } else {
        if ($edit == 0) {
            // Insert new record
            $sql = "INSERT INTO tbl_product (Name, price, des, dis, price_dis, photo, sub_id, cat_id, slide_id, od, click, name_link, uid, status) 
                    VALUES ('$name', '$price', '$des', '$price_dis', '$price_after', '$photo', '$sub_cate', '$cate', '$slide', '$od', '$click', '$name_link', '$uid', '$status')";
            $cnn->query($sql);
            $res['id'] = $cnn->insert_id;
        } else {
            // Update existing record
            $res['edit'] = true;
            $sql = "UPDATE tbl_product SET sub_id='$sub_cate', cat_id='$cate', price='$price', des='$des', dis='$price_dis', price_dis='$price_after', slide_id='$slide', Name='$name', photo='$photo', od='$od', status='$status' WHERE Id=$edit";
            $cnn->query($sql);
            $res['id'] = $edit;
        }
    }
    echo json_encode($res);
// echo json_encode($res);
?>
