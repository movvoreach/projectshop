<?php

$cnn = new mysqli("localhost", "root", "", "shop_project");
if ($cnn->connect_error) {
    die("Connection failed: " . $cnn->connect_error);
}
?>

<div class="frm frm-product" style="width: 860px;">
    <div class="title-box">
        <div class="title">
            Product
        </div>
        <div class="btn-close">
            <i class="fas fa-times"></i>
        </div>
    </div>
    <form class="upl">
        <div class="body">
            <div style="width: 45%;  float:left">
                <label>ID</label>
                <input type="text" id="txt-edit" name="txt-edit" value="0" hidden>
                <input type="text" name="txt-ID" id="txt-ID" class="frm-control">
                <label>Slide</label>
                <select name="txt-slide" id="txt-slide" class="frm-control">
                    <option value="">-----choose Sldie ----</option>
                    <option value="0">No</option>
                    <option value="1">Yes</option>
                </select>
                <label>Category</label>
                <select name="txt-cate" id="txt-cate" class="frm-control">
                    <option value="0">----Choose Category----</option>
                    <?php
                    // Ensure the database connection is established
                    // $cnn = new mysqli("hostname", "username", "password", "database");

                    $sql = "SELECT Id, Name FROM tbl_category WHERE status = '1'";
                    $result = $cnn->query($sql);

                    if (!$result) {
                        die("Query failed: " . $cnn->error);
                    }

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row["Id"] . "'>" . $row["Name"] . "</option>";
                        }
                    } else {
                        echo "<option value='0'>No category found</option>";
                    }

                    $cnn->close();
                    ?>
                </select>
                <label>Sub Category</label>
                <select name="txt-sub" id="txt-sub" class="frm-control">
                    <option value="0">----Choose SubCategory----</option>

                </select>

                <label>OD</label>
                <input type="text" name="txt-od" id="txt-od" class="frm-control">
                <label>Status</label>
                <select name="txt-select" id="txt-select" class="frm-control">
                    <option value="0">0</option>
                    <option value="1">1</option>
                </select>
                <label>Photo</label>
                <div class="img-box">
                    <input type="file" name="txt-photo" id="txt-photo" class="frm-control">
                    <input type="text" name="txt-photo" id="txt-img" hidden>
                </div>
            </div>
            <div style="width: 53%; float: right;margin-left:2%">
                <label>Name</label>
                <input type="text" name="txt-Name" id="txt-Name" class="frm-control">
                </textarea>
                <div style="width: 30%;float:left;margin-right:5%">
                    <label>Price</label>
                    <input type="text" name="txt-price" id="txt-price" class="frm-control">
                </div>
                <div style="width: 30%; float:left;margin-right:5%;"><label>Discout</label>
                    <input type="text" name="txt-dis" id="txt-dis" class="frm-control">
                </div>
                <div style="width: 30%; float:left">
                <label>After Discout</label>
                <input type="text" name="txt-price-dis" id="txt-Price-dis" class="frm-control">
                </div>
                
                <label>Descriction</label>
                <textarea name="txt-des" id="txt-des" class="frm-control" style="height: 245px;">

                </textarea>
            </div>

        </div>
        <div class="footer">
                <button class="btn btn-save">Save</button>
                <button class="btn btn-cancel">Cancel</button>
            </div>
    </form>
</div>