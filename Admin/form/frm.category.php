<?php

$cnn = new mysqli("localhost", "root", "", "shop_project");
if ($cnn->connect_error) {
    die("Connection failed: " . $cnn->connect_error);
}
?>

<div class="frm">
    <div class="title-box">
        <div class="title">
            category
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