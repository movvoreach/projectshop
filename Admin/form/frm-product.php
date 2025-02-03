<?php
// Database connection
$cnn = new mysqli("localhost", "root", "", "shop_project");
if ($cnn->connect_error) {
    die("Connection failed: " . $cnn->connect_error);
}



// if (!$result) {
//     die("Query failed: " . $cnn->error);
// }
?>

<div class="frm frm-product" style="width: 860px;">
    <div class="title-box">
        <div class="title">Product</div>
        <div class="btn-close"><i class="fas fa-times"></i></div>
    </div>
    <form class="upl" enctype="multipart/form-data">
        <div class="body">
            <div style="width: 45%; float:left;">
                <!-- <label>ID</label> -->
                <input type="text" id="txt-edit" name="txt-edit" value="0" hidden>
                <input type="text" name="txt-ID" id="txt-ID" class="frm-control" hidden>
                <label>Slide</label>
                <select name="txt-slide" id="txt-slide" class="frm-control">
                    <option value="">-----Choose Slide----</option>
                    <?php
                    $sql = "SELECT * FROM `tbl_slide` WHERE Status = '1'";
                    $result = $cnn->query($sql);
                    $numrow = $result->num_rows;
                    if ($numrow > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row["Id"] . "'>" . $row["Name"] . "</option>";
                        }
                    }

                    ?>
                    <!-- <option value="0">No</option>
                    <option value="1">Yes</option> -->
                </select>
                <label>Category</label>
                <select name="txt-cate" id="txt-cate" class="frm-control">
                    <option value="0">----Choose Category----</option>
                    <?php
                    // Fetch categories from the database
                    $sql = "SELECT Id, Name FROM tbl_category WHERE status = '1'";
                    $result = $cnn->query($sql);
                    $numrow = $result->num_rows;
                    if ($numrow > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row["Name"] . "'>" . $row["Name"] . "</option>";
                        }
                    } else {
                        echo "<option value='0'>No category found</option>";
                    }
                    ?>
                </select>
                <label>Brand Name</label>
                <select name="txt-sub" id="txt-sub" class="frm-control">
                    <option value="0">----Choose Brand Name----</option>
                    <?php
                    // Fetch subcategories from the database
                    $sql = "SELECT Id, name FROM tbl_subcategory WHERE status = '1'";
                    $result = $cnn->query($sql);

                    if (!$result) {
                        die("Query failed: " . $cnn->error);
                    }
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row["Id"] . "'>" . htmlspecialchars($row["name"]) . "</option>";
                        }
                    } else {
                        echo "<option value='0'>No subcategory found</option>";
                    }
                    ?>
                </select>

                <label>Quantity</label>
                <input type="text" name="txt-od" id="txt-od" class="frm-control">
                <label>Status</label>
                <select name="txt-select" id="txt-select" class="frm-control">
                    <option value="0">0</option>
                    <option value="1">1</option>
                </select>
                <label>Photo</label>
                <div class="img-box">
                    <input type="file" name="txt-photo" id="txt-photo" class="frm-control">
                    <input type="text" name="txt-img" id="txt-img" hidden>
                </div>
            </div>
            <div style="width: 53%; float: right; margin-left: 2%;">
                <label>Name</label>
                <input type="text" name="txt-Name" id="txt-Name" class="frm-control">
                <div style="width: 30%; float:left; margin-right: 5%;">
                    <label>Price</label>
                    <input type="text" name="txt-price" id="txt-price" class="frm-control">
                </div>
                <div style="width: 30%; float:left; margin-right: 5%;">
                    <label>Discount</label>
                    <input type="text" name="txt-dis" id="txt-dis" class="frm-control">
                </div>
                <div style="width: 30%; float:left;">
                    <label>After Discount</label>
                    <input type="text" name="txt-price-dis" id="txt-Price-dis" class="frm-control">
                </div>
                <label>Description</label>
                <textarea name="txt-des" id="txt-des" class="frm-control" style="height: 245px;"></textarea>
            </div>
        </div>
        <div class="footer">
            <button type="button" class="btn btn-save" onclick="save_Product($(this))">Save</button>
            <button type="button" class="btn btn-cancel">Cancel</button>
        </div>
    </form>
</div>

<script>
    $(document).ready(function() {
        $("#txt-price, #txt-dis").on("input", function() {
            let price = parseFloat($("#txt-price").val()) || 0;
            let discount = parseFloat($("#txt-dis").val()) || 0;

            // Ensure price and discount are valid
            if (price >= 0 && discount >= 0) {
                let discountedPrice = price - (price * (discount / 100));
                $("#txt-Price-dis").val(discountedPrice.toFixed(2));
            } else {
                $("#txt-Price-dis").val(""); // Clear if invalid
            }
        })
    });
</script>