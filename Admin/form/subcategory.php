<?php

$cnn = new mysqli("localhost", "root", "", "shop_project");
if ($cnn->connect_error) {
    die("Connection failed: " . $cnn->connect_error);
}
?>

<div class="frm">
    <div class="title-box">
        <div class="title">
            Sub category
        </div>
        <div class="btn-close">
            <i class="fas fa-times"></i>
        </div>
    </div>
    <form class="upl">
        <div class="body">
            <label>ID</label>
            <input type="text" id="txt-edit" name="txt-edit" value="0" hidden>
            <input type="text" name="txt-ID" id="txt-ID" class="frm-control">
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
            <label>Name</label>
            <input type="text" name="txt-Name" id="txt-Name" class="frm-control">

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
        <div class="footer">
            <button class="btn btn-save">Save</button>
            <button class="btn btn-cancel">Cancel</button>
        </div>
    </form>
</div>