<?php
include('Header.php');
$cnn = new mysqli("localhost", "root", "", "shop_project");
?>
<div class="bar-1">
    <ul>
        <li class="btn-menu">
            <i class="fas fa-bars"></i>
        </li>
        <li class="logo">
            <img src="img/spi.png">
        </li>
        <li class="title">Function</li>
        <li class="user">
            <i class="fas fa-user"></i>
            <span>Users :</span>
            <?php echo  $_SESSION['username'] ?>
        </li>
        <li class="logout " id="logoutBtn">
            <i class="fas fa-sign-out-alt"></i>
        </li>
    </ul>
</div>
<div class="menu">
    <ul>
        <li>
            <a><i class="fas fa-plus" style="margin-right: 4px;"></i>system</a>
            <div class="sub-menu">
                <ul>
                    <li data-opt="2">Employees</li>
                    <li data-opt="3">Customer</li>
                    <li>permission</li>
        </li>
    </ul>
</div>
</li>
<li>
    <a><i class="fas fa-plus" style="margin-right: 4px;"></i>product</a>
    <div class="sub-menu">
        <ul>
            <li data-opt="0">Slide</li>
            <li data-opt="1">Category</li>
            <li data-opt="4">Sub cotegory</li>
            <li data-opt="5">product</li>
            <li data-opt="6"> Order</li>
            <li data-opt="7"><i class="fa-solid fa-money-check"></i>Payment</li>
            <li data-opt="8">logout</li>
        </ul>
    </div>
</li>
</ul>

</div>
<div class="cnt">


    <div class="bar-2">


        <ul style="margin-top: 10px;">
            <ul class="serch-box" style="float: left; margin-right: 320px;">
                <li>
                    <input type="text" name="txt-serch-val" id="txt-serch-val">
                </li>
                <!-- <li>
                        <div class="select-wrapper">
                        <select name="txt-serch" id="text-serch">
                            <option value="id">ID</option>
                            <option value="name">Name</option>
                            <option value="status">Status</option>
                        </select>
                        </div>
                    </li> -->
                <li class="btn-serch">
                    Search
                </li>
            </ul>
            <ul>
                <li>
                    <a class="btn btn-add">Add New </a>
                </li>
                <li>
                    <div class="select-wrapper">
                        <select name="txt-select" id="txt-select">
                            <option value="10">10</option>
                            <option value="20">20</option>
                            <option value="30">30</option>
                        </select>

                </li>
                <li>
                    <a class="btn btn-page" id="btn-back">
                        <i class="fas fa-arrow-left"></i>
                    </a>
                </li>
                <li class="page-info"><span id="cur-page">1</span> / <span id="tota-page">0</span> of <span style="margin-left: 4px;" id="tatal-data">0</span></li>
                <li>
                    <a class="btn btn-page" id="btn-next">
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </li>
            </ul>
        </ul>
    </div>
    <div class="data">
        <ul style="width: 100%; margin-top: 40px; display: flex; flex-wrap: wrap; gap: 20px;margin-bottom: 20px;">
            <div class="box">
                <?php
                // Query to get the total count of customers
                $sql = "SELECT COUNT(*) AS total FROM tbl_customer";
                $result = $cnn->query($sql);

                // Fetch the result
                $totalCustomers = 0;
                if ($result) {
                    $row = $result->fetch_assoc();
                    $totalCustomers = $row['total'];
                }

                // Close the connection
                //$cnn->close();
                ?>
                <i class="fas fa-users"></i>
                <h1>Customer</h1>
                <h1 class="total">Total: <span id="total-customers"><?php echo $totalCustomers; ?></span>
            </div>
            <div class="box">
                <?php
                $sql = "SELECT COUNT(*) AS total FROM users";
                $result = $cnn->query($sql);
                $row = $result->fetch_assoc();
                $totalusers = $row['total'];
                ?>
                <i class="fas fa-shopping-cart"></i>
                <h1>Users</h1>
                <span class="total">Total: <span id="total-orders"><?php echo $totalusers ?></span></span>
            </div>
            <div class="box">
                <?php
                $sql = "SELECT COUNT(*) AS total FROM tbl_product";
                $result = $cnn->query($sql);
                $row = $result->fetch_assoc();
                $totalProducts = $row['total'];
                ?>
                <i class="fas fa-box"></i>
                <h1>Products</h1>
                <span class="total">Total: <span id="total-products"><?php echo $totalProducts; ?></span></span>
            </div>
            <div class="box">
                <?php
                $sql = "SELECT COUNT(*) AS total FROM tbl_category";
                $result = $cnn->query($sql);
                $row = $result->fetch_assoc();
                $totalCategory = $row['total'];
                ?>
                <i class="fas fa-tags"></i>
                <h1>Category</h1>
                <span class="total">Total: <span id="total-categories"><?php echo $totalCategory ?></span></span>
            </div>
            <div class="box">
                <i class="fas fa-money-bill-wave"></i>
                <h1>Payment</h1>
                <span class="total">Total: <span id="total-payments">0</span></span>
            </div>
            <div class="box">
                <i class="fas fa-money-bill-wave"></i>
                <h1>New Order</h1>
                <span class="total">Total: <span id="total-payments">0</span></span>
            </div>
        </ul>


        <table id="tbl-data">
            <h1 class="txt-title" style="margin-bottom: 20px;color:black;"></h1>

        </table>
    </div>
</div>

<?php
include("footer.php");
?>