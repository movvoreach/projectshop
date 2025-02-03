<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: ../register.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School</title>
    <link rel="icon" href="../Admin/img/icon.jpg" type="image/jpg">
    <link rel="stylesheet" href="Css/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
        ;

        /* CSS Document */
        body {
            margin: 0;
            color: #333;
        }

        p,
        h1,
        h2,
        ul {
            margin: 0;
            padding: 0;
        }

        div,
        li {
            box-sizing: border-box;
        }

        ul {
            list-style: none;
        }

        .bar-1 {
            background-color: #eee;
            float: left;
            width: 100%;
            border-bottom: 1px solid #ccc;
            box-sizing: border-box;
        }

        .bar-1 ul li {
            float: left;
            padding: 10px;
            box-sizing: border-box;
        }

        .bar-1 ul li.btn-menu {
            width: 2%;
            text-align: center;
            cursor: pointer;
        }

        .bar-1 ul li.btn-menu:hover {
            background-color: #ddd;
            color: #000;
        }

        .bar-1 ul li.logo {
            width: 16%;
            border-right: 2px solid #000;
            padding: 0px;
            cursor: pointer;
        }

        .bar-1 ul li.logo img {
            height: 37px;
            float: right;
            margin-right: 10px;


        }

        .bar-1 ul li.title {
            width: 58%;
            border-right: 2px solid #000;

        }

        .bar-1 ul li.user {
            width: 21%;
            border-right: 2px solid #000;

        }

        .bar-1 ul li.logout {
            width: 2%;
            cursor: pointer;
            margin-left: 10px;

        }

        .menu {
            width: 18%;
            height: 100%;
            top: 55px;
            left: 0;
            position: fixed;
            border-right: 2px solid #000;
            transition: 0.5s;
        }

        .menu ul li {
            width: 100%;
            float: left;
            border-bottom: 2px solid #ccc;
            transition: 0.5s;
            cursor: pointer;
        }

        .menu ul li a {
            display: block;
            width: 100%;
            padding: 13px 13px;
            text-decoration: none;
            color: #333;
            box-sizing: border-box;
            cursor: pointer;
            transition: 0.5s;
        }

        .sub-menu {
            display: none;
            width: 80%;
            float: left;
            margin-left: 10%;
            background-color: #eee;
            margin-bottom: 10px;
        }

        .sub-menu ul li {
            padding: 13px 10px;
            transition: 0.5s;
        }

        .sub-menu ul li:last-child {
            border-bottom: none;
        }

        .sub-menu ul li:hover {
            cursor: pointer;
            background-color: #EF8385;
            color: #fff;
        }

        .cnt {
            width: 80%;
            height: 100%;
            position: fixed;
            top: 20%;
            left: 20%;
        }

        .cnt {
            width: 81%;
            height: 100%;
            position: fixed;
            top: 32px;
            left: 19%;
            transition: 0.5s;

        }

        .bar-2 {
            /* display: flex; */
            width: 100%;
            float: left;
            border-bottom: 2px solid #ccc;
            display: none;
        }

        .serch-box {
            float: left;
            display: flex;
            align-items: center;
            margin-left: 20px;
        }

        .serch-box li {
            margin-right: 10px;
            /* Changed from margin-left to margin-right */
        }

        .serch-box input[type="text"] {
            padding: 8px 13px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            outline: none;
        }

        .serch-box select {
            padding: 8px 13px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }

        .serch-box .btn-serch {
            cursor: pointer;
            padding: 8px 13px;
            background-color: #f9f9f9;
            border: 1px solid #ccc;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .serch-box .btn-serch:hover {
            background-color: #e6e6e6;
        }


        .bar-2 ul {
            float: right;
        }

        .bar-2 ul li {
            float: left;
            padding: 10px;
        }


        .bar-2 ul li select {
            padding: 8px 13px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
            color: #333;
            outline: none;
            transition: all 0.3s ease;
        }

        .select-wrapper {
            position: relative;
            display: inline-block;
            width: 80px;
            /* Adjust as needed */
        }

        .select-wrapper select {
            width: 100%;
            padding: 8px 13px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: transparent;
            color: #333;
            appearance: none;
            /* Removes default dropdown arrow */
            outline: none;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        /* Add the icon */
        .select-wrapper::after {
            content: '\25BC';
            /* Unicode for downward arrow */
            position: absolute;
            top: 50%;
            right: 10px;
            /* Adjust to align with padding */
            transform: translateY(-50%);
            pointer-events: none;
            /* Ensures the icon does not block clicks */
            font-size: 14px;
            color: #999;
        }

        /* Hover effect */
        .select-wrapper select:hover {
            background-color: #e6e6e6;
            border-color: #999;
        }

        /* Focus effect */
        .select-wrapper select:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }



        .bar-2 ul li.page-info {
            color: #333;
            padding: 8px 13px;
            float: left;
            font-size: 16px;
            margin-top: 10px;
        }


        .btn {
            padding: 8px 13px;
            float: left;
            border-radius: 4px;
            cursor: pointer;
        }

        .btn:hover {
            opacity: 0.7;
        }

        .btn-add {
            background-color: dodgerblue;
            color: white;
        }

        .btn-page {
            background-color: olivedrab;
            color: white;
        }

        .data {
            margin-top: 15px;
            width: 100%;
            height: 90%;
            float: left;
            overflow-y: scroll;

        }

        .data table {
            width: 100%;
            border-collapse: collapse;
            text-align: center;

        }

        .data table tr th {
            position: sticky;
            /* Ensures the header sticks while scrolling */
            top: 0;
            /* Sticks the header to the top */
            z-index: 1;
            /* Ensures the header stays above the table rows */
            background-color: #eee;
            /* Background color for better visibility */
            padding: 7px;
            border: 1px solid #ccc;
            cursor: pointer;
        }


        .data table tr td {

            padding: 5px;
            border: 1px solid #ccc;
        }

        .data table tr td span {
            display: none;
        }

        .data table tr td img {
            width: 50px;
            height: 50px;
            object-fit: cover;
        }

        .data table tr:nth-child(even) td {
            background-color: #f2f2f2;
        }

        .popup {
            position: fixed;
            top: 0;
            left: 0;
            background-color: rgba(0, 0, 0, 0.5);
            width: 100%;
            height: 100%;
            transition: 0.8s;
        }

        .frm {
            width: 500px;
            margin: 20px auto;
            overflow: hidden;
            border-radius: 8px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border: 1px solid #ddd;
            animation: fadeIn 0.3s ease-in-out;
        }

        .frm .title-box {
            width: 100%;
            background-color: #f5f5f5;
            border-bottom: 1px solid #ccc;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 8px 13px;
        }

        .frm .title-box .title {
            font-size: 15px;
            font-weight: bold;
            color: #333;
        }

        .frm .title-box .btn-close {
            text-align: center;
            cursor: pointer;
            background-color: #ff4d4d;
            color: white;
            border-radius: 4px;
            padding: 3px 7px;
            transition: background-color 0.3s ease;
        }

        .frm .title-box .btn-close:hover {
            background-color: #cc0000;
        }

        .frm .body {
            padding: 13px;
        }

        label {
            font-size: 12px;
            font-weight: bold;
            color: #555;
            margin-top: 5px;
            display: block;
        }

        .frm-control {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 15px;
            transition: border-color 0.3s ease;
        }

        .frm-control:focus {
            border-color: #007bff;
            outline: none;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }

        select.frm-control {
            cursor: pointer;
            appearance: none;
            background: #fff url('data:image/svg+xml;charset=UTF-8,%3Csvg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 4 5"%3E%3Cpath fill="%23000" d="M2 0L0 2h4zm0 5L0 3h4z"/%3E%3C/svg%3E') no-repeat right 10px center;
            background-size: 12px 12px;
        }

        .img-box {
            position: relative;
            width: 100px;
            height: 100px;
            border: 1px dashed #ccc;
            margin-top: 5px;
            border-radius: 5px;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            display: flex;
            align-items: center;
            justify-content: center;
            background-image: url("../Admin/img/img.png");
        }

        .img-box input {
            position: absolute;
            width: 100%;
            height: 100%;
            opacity: 0;
            cursor: pointer;
        }

        .img-box::after {
            /* content: "Upload Photo"; */
            font-size: 14px;
            color: #777;
            display: block;
            text-align: center;
        }

        .footer {
            width: 100%;
            /* Ensures it spans the full width */
            padding: 15px;
            border-top: 1px solid #ccc;
            background-color: #f9f9f9;
            display: flex;
            /* Flexbox for button alignment */
            justify-content: flex-end;
            /* Align buttons to the right */
        }


        .footer .btn {
            margin-right: 10px;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
            font-weight: bold;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .footer .btn-save {
            background-color: #28a745;
            color: white;
        }

        .footer .btn-save:hover {
            background-color: #218838;
            transform: scale(1.05);
        }

        .footer .btn-cancel {
            background-color: #dc3545;
            color: white;
        }

        .footer .btn-cancel:hover {
            background-color: #c82333;
            transform: scale(1.05);
        }

        .btnedit {
            padding: 5px 10px;
            border: none;
            border-radius: 2px;
            cursor: pointer;
            font-size: 14px;
            font-weight: bold;
            color: linear-gradient(135deg, #007bff, #0056b3);
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .btndelete {
            padding: 5px 10px;
            border: none;
            border-radius: 2px;
            cursor: pointer;
            font-size: 14px;
            font-weight: bold;
            color: red;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }
    </style>
    <!-- <style>
        
    </style> -->
</head>

<body>
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
                <li data-opt="1">Gategory</li>
                <li data-opt="4">Sub cotegory</li>
                <li data-opt="5">product</li>
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
            <table id="tbl-data">

            </table>
        </div>
    </div>

</body>
<script>
    $(document).ready(function() {
        var btnedit = '<button type="button" class="btnedit"><i class="fa fa-edit"></i></button> ';
        var btndelete = '<button type="button" class="btndelete"><i class="fa fa-trash"></i></button> ';
        var totalpages = $('#tota-page');
        var Datatotal = $('#tatal-data');
        var e = $('#txt-select')
        var s = 0;
        var body = $('body');
        var popup = '<div class="popup"></div>';
        var cnt = $('.cnt');
        var menu = $('.menu');
        var frm = Array('frm.slide.php', 'frm.category.php', 'Addusers.php', 'frm-change-passwords.php', 'subcategory.php', 'frm-product.php'); // Ensure the forms exist on the server
        var frmInd;
        var optmenu = 0;
        var tbldata = $('#tbl-data');
        var wait = 'Waiting <i class="fa fa-refresh fa-spin"></i>Loading'
        // var img = $('.img-box');
        var btnedit = '<button type="button" class="btnedit"><i class="fa fa-edit"></i></button> ';
        var btndelete = '<button type="button" class="btndelete"><i class="fa fa-trash"></i></button> ';
        var btnnext = $('#btn-next');
        var btnback = $('#btn-back');
        var curpage = $('#cur-page');
        var Search = $('#txt-serch-val');

        $('#txt-serch-val').on('input', function() {
            var searchValue = Search.val(); // Get the search value

            $.ajax({
                type: "POST",
                url: "Action/Search.php",
                data: {
                    Search: searchValue
                },
                dataType: "json",
                success: function(response) {

                    tbldata.empty(); // Clear previous results

                    if (response.length > 0) {
                        // Append table headers
                        tbldata.append(
                            '<tr>' +
                            '<th width="50px">ID</th>' +
                            '<th>Slide Name</th>' +
                            '<th width="50px">OD</th>' +
                            '<th width="50px">Photo</th>' +
                            '<th width="50px">Status</th>' +
                            '<th width="75px">Action</th>' +
                            '</tr>'
                        );

                        // Append table rows dynamically
                        response.forEach(item => {
                            tbldata.append(
                                '<tr>' +
                                '<td>' + item.Id + '</td>' +
                                '<td>' + item.Name + '</td>' +
                                '<td>' + item.od + '</td>' +
                                '<td><img src="img/' + item.photo + '" alt="Photo" width="50"></td>' +

                                '<td>' + item.Status + '</td>' +
                                '<td>' +
                                btnedit +
                                btndelete +
                                '</td>' +
                                '</tr>'

                            );

                        });
                        // Editdata(eThis)

                    } else {
                        tbldata.append('<tr><td colspan="6">No results found</td></tr>');
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                    tbldata.append('<tr><td colspan="6">An error occurred while fetching data</td></tr>');
                }
            });
        });





        // Toggle sub-menu visibility on click
        $('.menu ul li > a').click(function() {
            $(this).siblings('.sub-menu').slideToggle();
            $(this).parent().siblings().find('.sub-menu').slideUp();
        });

        // Toggle menu visibility on button click
        $('.btn-menu').click(function() {
            if (optmenu == 0) {
                menu.css({
                    'left': '-21%'
                });
                cnt.css({
                    'width': '100%',
                    'left': '0'
                });
                optmenu = 1;
            } else {
                menu.css({
                    'left': '0'
                });
                cnt.css({
                    'width': '81%',
                    'left': '19%'
                });
                optmenu = 0;
            }
        });
        // Filtter 
        $('#txt-select').change(function() {
            if (frmInd === 0) {
                GetSlideData();
            } else if (frmInd === 1) {
                GetCategorieData()
            } else if (frmInd === 2) {
                getusers();
            } else if (frmInd === 3) {
                changepassword();
            } else if (frmInd === 4) {
                getsubcategory()
            } else if (frmInd === 5) {
                getProduct()
            }
            totalpages.text(Math.ceil(Datatotal.text() / e.val()));
        });
        // Handle "Next" button click
        btnnext.click(function() {
            if (parseInt(curpage.text()) === parseInt(totalpages.text())) {
                return; // Prevent navigation beyond the last page
            }
            s += parseInt(e.val()); // Increment offset
            curpage.text(parseInt(curpage.text()) + 1); // Update current page
            if (frmInd === 0) {
                GetSlideData();
            } else if (frmInd === 1) {
                GetCategorieData()
            } else if (frmInd === 2) {
                getusers();
            } else if (frmInd === 3) {
                changepassword();
            };
        });

        // Handle "Back" button click
        btnback.click(function() {
            if (parseInt(curpage.text()) === 1) {
                return; // Prevent navigation before the first page
            }
            s -= parseInt(e.val()); // Decrement offset
            curpage.text(parseInt(curpage.text()) - 1); // Update current page
            if (frmInd === 0) {
                GetSlideData();
            } else if (frmInd === 1) {
                GetCategorieData()
            } else if (frmInd === 2) {
                getusers();
            } else if (frmInd === 3) {
                changepassword();
            }
        });
        // Set frmInd when a menu item is clicked
        $('.sub-menu').on('click', 'ul li', function() {
            var eThis = $(this);
            frmInd = eThis.data('opt');
            $('.bar-2').show()
            $('.bar-1').find('.title').text(eThis.text());
            $('.sub-menu').find('ul li').css({
                "background-color": "#eee",
                "color": "#000"
            });
            eThis.css({
                "background-color": "red",
                "color": "#fff"
            });
            if (frmInd == 0) {
                GetSlideData()
            } else if (frmInd == 1) {
                GetCategorieData()
            } else if (frmInd == 2) {
                getusers()
            } else if (frmInd == 3) {
                changepassword()
            } else if (frmInd == 4) {
                getsubcategory()
            } else if (frmInd == 5) {
                getProduct()
            }
            Countdata();
        });

        function Countdata() {
            // Check if frmInd is set
            // alert(frmInd);
            $.ajax({
                type: "POST",
                url: "Get/count-silde-data.php",
                data: {
                    opt: frmInd
                },
                // processData: false,
                cache: false,
                // contentType: false,
                dataType: "json",
                beform: function(response) {

                },
                success: function(response) {
                    //    alert(response.total);
                    Datatotal.text(response.total);
                    totalpages.text(Math.ceil(response.total / e.val()));
                }

            });
        };
        // Open form when "Add New" button is clicked
        $('.btn-add').click(function() {
            // Check if frmInd is set
            body.append(popup);
            $('.popup').load('form/' + frm[frmInd], function(responseTxt, statusTxt, xhr) {
                if (statusTxt === "success") {
                    getautoid();
                } else if (statusTxt === "error") {
                    alert("Error: " + xhr.status + ": " + xhr.statusText);
                }
            });

        });
        // Edit button
        body.on('click', 'table tr td .btnedit', function() {
            var eThis = $(this); // Reference the clicked button
            body.append(popup); // Append the popup to the body
            $('.popup').load('form/' + frm[frmInd], function(responseTxt, statusTxt, xhr) {
                if (statusTxt === "success") {
                    if (frmInd === 0) {
                        Editdata(eThis);
                    } else if (frmInd === 1) {
                        editcategorie(eThis);
                    } else if (frmInd === 2) {
                        editemployee(eThis);
                        $('#txt-pass').hide();
                        $('#txt-pass').hide();
                    } else if (frmInd === 3) {
                        editchangepassword(eThis);
                        $('#txt-pass').hide();
                        $('#txt-pass').hide();
                    } else if (frmInd === 4) {
                        edit_sub_category(eThis);
                    }
                    // Pass the button reference to Editdata
                } else if (statusTxt === "error") {
                    alert("Error: " + xhr.status + ": " + xhr.statusText);
                }
            });
        });

        function editemployee(eThis) {
            var parent = eThis.parents('tr'); // Get the parent row of the button
            var id = parent.find('td:eq(0)').text();
            var photo = parent.find('td:eq(1) img').attr('alt');
            var name = parent.find('td:eq(2)').text();
            // var od = parent.find('td:eq(3)').text();
            var phonenumber = parent.find('td:eq(3)').text();
            var email = parent.find('td:eq(4)').text();
            var position = parent.find('td:eq(5)').text();
            // alert(name)
            //  var img = body.find('#txt-img').val();
            // alert(photo );

            // // Update the form fields with the extracted data
            body.find('.frm #txt-edit').val(id);
            body.find('.frm #txt-ID').val(id);
            body.find('.frm #txt-fullname').val(name);
            body.find('.frm #txt-ph').val(phonenumber);
            body.find('.frm #txt-email').val(email);
            body.find('.frm #txt-img').val(photo);
            body.find('.frm .img-box').css('background-image', 'url(img/' + photo + ')');
            body.find('.frm #txt-select').val(position);
        }
        //editchangepassword;
        function editchangepassword(eThis) {
            var parent = eThis.parents('tr'); // Get the parent row of the button
            var id = parent.find('td:eq(0)').text();
            var username = parent.find('td:eq(1)').text();
            var phone = parent.find('td:eq(2)').text();
            var email = parent.find('td:eq(3)').text();
            var Address = parent.find('td:eq(4)').text();
            // alert(Address)
            // Update the form fields with the extracted data
            body.find('.frm #txt-edit').val(id);
            body.find('.frm #txt-ID').val(id);
            body.find('.frm #txt-fullname').val(username);
            body.find('.frm #txt-ph').val(phone);
            body.find('.frm #txt-txt-email').val(email);
            body.find('.frm #txt-select').val(Address);

        }

        // Delete button
        // Handle delete button click
        body.on('click', 'table tr td .btndelete', function() {
            var eThis = $(this); // Reference the clicked delete button
            var parent = eThis.parents('tr'); // Get the parent row of the clicked button
            var id = parent.find('td:eq(0)').text(); // Get the ID from the first column of the row

            if (confirm('Are you sure you want to delete ')) {
                $.ajax({
                    url: "Action/delete.php", // Backend endpoint for deletion
                    type: "POST", // HTTP method
                    data: {
                        id: id,
                        opt: frmInd
                    }, // Send the ID to the server (lowercase 'id')
                    dataType: 'JSON', // Expect JSON response
                    success: function(data) {
                        if (data.delete === true) { // Check if deletion was successful
                            alert('Item deleted successfully');
                            parent.remove(); // Remove the row from the table
                        } else {
                            alert('Error deleting item: ' + (data.error || 'Unknown error'));
                        }
                        Countdata(); // Update the total count
                    },
                    error: function(xhr, status, error) {
                        alert('AJAX error: ' + error); // Handle AJAX request errors
                    }
                });
            }
        });


        // Close the popup when the close button is clicked
        body.on('click', '.frm .btn-close', function() {
            $('.popup').remove();
        });
        // save data 
        body.on('click', '.frm .btn-save', function(eThis) {
            var eThis = $(this);
            if (frmInd == 0) {
                saveSlider(eThis);
                $('.popup').remove();
            } else if (frmInd == 1) {
                saveCategories(eThis);
                $('.popup').remove();
            } else if (frmInd == 2) {
                saveEmployees(eThis)
                $('.popup').remove();
            } else if (frmInd == 3) {
                saveCustomer(eThis);
                $('.popup').remove();
            } else if (frmInd == 4) {
                save_sub_category(eThis)
                $('.popup').remove();
            } else if (frmInd == 5) {
                save_Product(eThis);
                $('.popup').remove();
            }
        });

        function save_sub_category(eThis) {
            //var  eThis = $(this);
            var parent = eThis.parents('.frm');
            var sub_id = parent.find('#txt-cate');
            var sub_name = parent.find('#txt-cate option:selected').text();
            var name = parent.find('#txt-Name');
            var id = parent.find('#txt-ID');
            var od = parent.find('#txt-od');
            var photo = parent.find('#txt-img');
            var status = parent.find('#txt-select');
            var frm = eThis.closest('form.upl');
            var form_data = new FormData(frm[0]);
            if (name == '') {
                alert('Please enter a name');
                name.focus();
                return;
            } else if (sub_id.val() == '0') {
                alert('Please select a category');
                sub_id.focus();
                return;
            };
            $.ajax({
                type: "POST",
                url: "Action/save_subcategory.php",
                data: form_data,
                processData: false,
                cache: false,
                contentType: false,
                dataType: "json",
                beform: function(response) {
                    // eThis.html(wait);

                },
                success: function(response) {
                    // alert(response.dpl);
                    if (response.dpl == true) {
                        alert('Duplicate Name');
                    }
                    Countdata();
                    getsubcategory();
                    var tr = '<tr>' +
                        '<td>' + response.id + '</td>' +
                        '<td> <span>' + sub_id.val() + '</span>' + sub_name + '</td>' +
                        '<td>' + name.val() + '</td>' +
                        '<td>' + od.val() + '</td>' +
                        '<td><img src="img/' + photo.val() + '" ></td>' +
                        '<td>' + status.val() + '</td>' +
                        '<td>>' + btnedit + btndelete + '</td>' +
                        '</tr>';
                    // alert(response.dpl);
                    tbldata.append(tr);
                    // $('.popup').remove();
                    // GetSlideData();
                }
            });

        }

        function edit_sub_category(eThis) {
            var parent = eThis.parents('tr'); // Get the parent row of the button
            var id = parent.find('td:eq(0)').text();
            var cat = parent.find('td:eq(1) span').text()
            // alert(cat)
            var name = parent.find('td:eq(2)').text();
            var od = parent.find('td:eq(3)').text();
            var photo = parent.find('td:eq(4) img').attr('alt');
            var status = parent.find('td:eq(5)').text();
            // var img = body.find('#txt-img').val();
            // alert(photo );

            // Update the form fields with the extracted data
            body.find('.frm #txt-edit').val(id);
            body.find('.frm #txt-ID').val(id);
            body.find('.frm #txt-cate').val(cat);
            body.find('.frm #txt-Name').val(name);
            body.find('.frm #txt-od').val(od);
            body.find('.frm #txt-img').val(photo);
            body.find('.frm .img-box').css('background-image', 'url(img/' + photo + ')');

            body.find('.frm #txt-select').val(status);
        }

        function getsubcategory() {
            var tr = '<tr>' +
                '<th width="50px">ID</th>' +
                '<th width="75px">Category</th>' +
                '<th>Brand</th>' +
                '<th width="50px">OD</th>' +
                '<th width="50px">Photo</th>' +
                '<th width="50px">Status</th>' +
                '<th width="75px">Action</th>' +
                '</tr>';

            $.ajax({
                type: "POST",
                url: "Get/get_sub_categorydata.php",
                data: {
                    opt: e.val(),
                    s: s
                },
                cache: false,
                dataType: "json",
                beforeSend: function() {
                    // You can add a loading spinner or any other pre-request logic here
                },
                success: function(response) {
                    if (response.length > 0) {
                        var row = '';
                        for (i = 0; i < response.length; i++) {
                            row += '<tr>' +
                                '<td>' + response[i].id + '</td>' +
                                '<td>' + '<span>' + response[i].cate_id + '</span>' + response[i].cate_name + '</td>' +
                                '<td>' + response[i].name + '</td>' +
                                '<td>' + response[i].od + '</td>' +
                                '<td><img src="img/' + response[i].photo + '" alt="' + response[i].photo + '"></td>' +
                                '<td>' + response[i].status + '</td>' +
                                '<td>' + btnedit + btndelete + '</td>' +
                                '</tr>';
                        }
                        tbldata.html(tr + row);
                        // alert("Data loaded successfully!");
                    } else {
                        alert("No data found!");
                    }
                },
                error: function(xhr, status, error) {
                    alert("An error occurred while loading data: " + error);
                }
            });
        }


        function save_Product(eThis) {
            var parent = eThis.parents('.frm');
            var sub_id = parent.find('#txt-cate');
            var sub_name = parent.find('#txt-cate option:selected').text();
            var name = parent.find('#txt-Name');
            var slide = parent.find('#txt-slide');
            var sub_cate = parent.find('#txt-sub');
            var price = parent.find('#txt-price');
            var discount = parent.find('#txt-dis');
            var description = parent.find('#txt-des');
            var price_after = parent.find('#txt-Price-dis');
            var id = parent.find('#txt-ID');
            var od = parent.find('#txt-od');
            var photo = parent.find('#txt-img');
            var status = parent.find('#txt-select');
            var frm = eThis.closest('form.upl');
            var form_data = new FormData(frm[0]);

            // Validation
            if (name.val() === '') {
                alert('Please enter a name');
                name.focus();
                return;
            } else if (sub_id.val() === '0') {
                alert('Please select a category');
                sub_id.focus();
                return;
            }

            // AJAX request
            $.ajax({
                type: "POST",
                url: "Action/save_product.php",
                data: form_data,
                processData: false,
                cache: false,
                contentType: false,
                dataType: "json",
                beforeSend: function() {
                    // Show loading indicator if needed
                },
                success: function(response) {
                    getProduct()
                    Countdata();
                    if (response.dpl === true) {
                        alert('Duplicate Name');
                    } else {
                        // Update the table with the new data
                        var tr = '<tr>' +
                            '<td>' + response.id + '</td>' +
                            '<td><span>' + sub_id.val() + '</span>' + sub_name + '</td>' +
                            '<td>' + name.val() + '</td>' +
                            '<td>' + od.val() + '</td>' +
                            '<td><img src="img/' + photo.val() + '" alt="Product Image"></td>' +
                            '<td>' + status.val() + '</td>' +
                            '<td>' + btnedit + btndelete + '</td>' +
                            '</tr>';
                        $('#tbldata').append(tr); // Assuming `tbldata` is the ID of your table body
                    }
                    Countdata();
                    getProduct()
                },
                error: function(xhr, status, error) {
                    console.error("AJAX Error: " + status + error);
                }
            });
        }

        function edit_sub_category(eThis) {
            var parent = eThis.parents('tr'); // Get the parent row of the button
            var id = parent.find('td:eq(0)').text();
            var cat = parent.find('td:eq(1) span').text()
            // alert(cat)
            var name = parent.find('td:eq(2)').text();
            var od = parent.find('td:eq(3)').text();
            var photo = parent.find('td:eq(4) img').attr('alt');
            var status = parent.find('td:eq(5)').text();
            // var img = body.find('#txt-img').val();
            // alert(photo );

            // Update the form fields with the extracted data
            body.find('.frm #txt-edit').val(id);
            body.find('.frm #txt-ID').val(id);
            body.find('.frm #txt-cate').val(cat);
            body.find('.frm #txt-Name').val(name);
            body.find('.frm #txt-od').val(od);
            body.find('.frm #txt-img').val(photo);
            body.find('.frm .img-box').css('background-image', 'url(img/' + photo + ')');

            body.find('.frm #txt-select').val(status);
        }

        function getProduct() {
            var tr = '<tr>' +
                '<th width="25px">ID</th>' +
                '<th width="50px">Photo</th>' +
                '<th width="100px">Product Name </th>' +
                '<th width="50px">Price</th>' +
                '<th width="50px">Discount</th>' +
                '<th width="100px">Price After Discount</th>' +
                '<th width="50px">Quantity</th>' +
                '<th width="50px">Description</th>' +
                '<th width="50px">Status</th>' +
                '<th width="75px">Action</th>' +
                '</tr>';

            $.ajax({
                type: "POST",
                url: "Get/get_Product.php",
                data: {
                    opt: e.val(),
                    s: s
                },
                cache: false,
                dataType: "json",
                beforeSend: function() {
                    // You can add a loading spinner or any other pre-request logic here
                },
                success: function(response) {
                    if (response.length > 0) {
                        var row = '';
                        for (i = 0; i < response.length; i++) {
                            '<td>' + response[i].price + '$' + '</td>' +
                                '<td>' + response[i].dis + '%' + '</td>'

                            row += '<tr>' +
                                '<td>' + response[i].Id + '</td>' +
                                '<td><img src="img/' + response[i].photo + '" alt="' + response[i].photo + '"></td>' +
                                // '<td>' + '<span>' + response[i].cate_id + '</span>' + response[i].cate_name + '</td>' +
                                '<td>' + response[i].Name + '</td>' +
                                '<td>' + response[i].price + '$' + '</td>' +
                                '<td>' + response[i].dis + '%' + '</td>' +
                                '<td>' + response[i].price_dis + '$' + '</td>' +
                                '<td>' + response[i].od + '</td>' +
                                '<td>' + response[i].des + '</td>' +
                                '<td>' + response[i].status + '</td>' +
                                '<td>' + btnedit + btndelete + '</td>' +
                                '</tr>';
                        }
                        tbldata.html(tr + row);
                        // alert("Data loaded successfully!");
                    } else {
                        // alert("No data found!");
                    }
                },
                error: function(xhr, status, error) {
                    alert("An error occurred while loading data: " + error);
                }
            });
        }





        function saveSlider(eThis) {
            //var  eThis = $(this);
            var parent = eThis.parents('.frm');
            var name = parent.find('#txt-Name');
            var id = parent.find('#txt-Id');
            var od = parent.find('#txt-od');
            var photo = parent.find('#txt-img');
            var status = parent.find('#txt-select');
            var frm = eThis.closest('form.upl');
            var form_data = new FormData(frm[0]);
            if (name == '') {
                alert('Please enter a name');
                name.focus();
                return;
            }
            $.ajax({
                type: "POST",
                url: "Action/saveSlide.php",
                data: form_data,
                processData: false,
                cache: false,
                contentType: false,
                dataType: "json",
                beform: function(response) {
                    // eThis.html(wait);

                },
                success: function(response) {
                    // alert(response.dpl);
                    if (response.dpl == true) {
                        alert('Duplicate Name');
                    }
                    Countdata();
                    GetSlideData();
                    var tr = '<tr>' +
                        '<td>' + response.id + '</td>' +
                        '<td>' + name.val() + '</td>' +
                        '<td>' + od.val() + '</td>' +
                        '<td><img src="img/' + photo.val() + '" ></td>' +
                        '<td>' + status.val() + '</td>' +
                        '<td>>' + btnedit + btndelete + '</td>' +
                        '</tr>';
                    // alert(response.dpl);
                    tbldata.append(tr);
                    // $('.popup').remove();
                    // GetSlideData();
                }
            });

        }
        // get sldie data
        function GetSlideData() {

            var tr = '<tr>' +
                '<th width="50px">ID</th>' +
                '<th>Slide Name</th>' +
                '<th width="50px">OD</th>' +
                '<th width="50px">Photo</th>' +
                '<th width="50px">Status</th>' +
                '<th width="75px">Action</th>'
            '</tr>';

            $.ajax({
                type: "POST",
                url: "Get/Get_Slide_data.php",
                data: {
                    opt: e.val(),
                    s: s
                },
                // processData: false,
                cache: false,
                // contentType: false,
                dataType: "json",
                beform: function(response) {

                },
                success: function(response) {
                    // alert(response.name);
                    var row = '';
                    for (i = 0; i < response.length; i++) {
                        row += '<tr>' +
                            '<td>' + response[i].id + '</td>' +
                            '<td>' + response[i].name + '</td>' +
                            '<td>' + response[i].od + '</td>' +
                            '<td><img src="img/' + response[i].photo + '" alt="' + response[i].photo + '"></td>' +
                            '<td>' + response[i].status + '</td>' +
                            '<td>' + btnedit + btndelete + '</td>' +
                            // '<td>'++'</td>'+
                            '</tr>';
                        // tbldata.append(row);
                    }
                    tbldata.html(tr + row);
                    // s = s + parseInt(e.val());
                }
            });
        }

        function Editdata(eThis) {
            var parent = eThis.parents('tr'); // Get the parent row of the button
            var id = parent.find('td:eq(0)').text();
            var name = parent.find('td:eq(1)').text();
            var od = parent.find('td:eq(2)').text();
            var photo = parent.find('td:eq(3) img').attr('alt');
            var status = parent.find('td:eq(4)').text();
            // var img = body.find('#txt-img').val();
            // alert(photo );

            // Update the form fields with the extracted data
            body.find('.frm #txt-edit').val(id);
            body.find('.frm #txt-ID').val(id);
            body.find('.frm #txt-Name').val(name);
            body.find('.frm #txt-od').val(od);
            body.find('.frm #txt-img').val(photo);
            body.find('.frm .img-box').css('background-image', 'url(img/' + photo + ')');

            body.find('.frm #txt-select').val(status);
        }

        // save Employess data
        function saveEmployees(eThis) {
            var frm = eThis.closest('form.upl');
            var form_data = new FormData(frm[0]);

            if (!form_data.get("txt-fullname")) {
                alert("Please enter a full name.");
                return;
            }

            $.ajax({
                type: "POST",
                url: "http://localhost/Project_shop/Admin/Action/saveem.php",
                data: form_data,
                processData: false,
                contentType: false,
                success: function(response) {
                    getusers();
                    Countdata();
                    row += '<tr>' +
                        '<td><img src="img/' + response[i].photo + '" alt="' + response[i].photo + '"></td>' +
                        '<td>' + response[i].usersname + '</td>' +
                        '<td>' + response[i].phone + '</td>' +
                        '<td>' + response[i].email + '</td>' +
                        '<td>' + response[i].status + '</td>' +
                        '<td>' + response[i].create_date + '</td>' + // Adjust to match PHP response
                        '<td>' + btnedit + btndelete + '</td>' +
                        '</tr>';
                    // alert(response);
                    tbldata.append(row);
                    // Reset the form input fields
                    // name.val('');
                    // od.val('');
                    // photo.val('');
                    // status.val('');
                    // $('.popup').remove();
                    // GetSlideData();
                    // location.reload();
                    // $('.popup').remove();
                    // GetSlideData();
                    location.reload();
                }
            });
        }



        function saveCategories(eThis) {
            //var  eThis = $(this);
            var parent = eThis.parents('.frm');
            var name = parent.find('#txt-Name');
            var id = parent.find('#txt-Id');
            var od = parent.find('#txt-od');
            var photo = parent.find('#txt-img');
            var status = parent.find('#txt-select');
            var frm = eThis.closest('form.upl');
            var form_data = new FormData(frm[0]);
            if (name == '') {
                alert('Please enter a name');
                name.focus();
                return;
            }
            $.ajax({
                type: "POST",
                url: "Action/savecategory.php",
                data: form_data,
                processData: false,
                cache: false,
                contentType: false,
                dataType: "json",
                beform: function(response) {
                    // eThis.html(wait);

                },
                success: function(response) {
                    // alert(response.dpl);
                    if (response.dpl == true) {
                        alert('Duplicate Name');
                    }

                    GetCategorieData();
                    Countdata();

                    var tr = '<tr>' +
                        '<td>' + response.id + '</td>' +
                        '<td>' + name.val() + '</td>' +
                        '<td>' + od.val() + '</td>' +
                        '<td><img src="img/' + photo.val() + '" ></td>' +
                        '<td>' + status.val() + '</td>' +
                        '<td>' + btnedit + btndelete + '</td>' +
                        '</tr>';
                    tbldata.append(tr);
                }
            });
        }

        function GetCategorieData() {
            var tr = '<tr>' +
                '<th width="50px">ID</th>' +
                '<th>Category Name</th>' +
                '<th width="50px">OD</th>' +
                '<th width="50px">Photo</th>' +
                '<th width="50px">Status</th>' +
                '<th width="75px">Action</th>'
            '</tr>';

            $.ajax({
                type: "POST",
                url: "Get/get_categorydata.php",
                data: {
                    opt: e.val(),
                    s: s
                },

                cache: false,
                dataType: "json",
                beform: function(response) {

                },
                success: function(response) {
                    // alert(response.name);
                    var row = '';
                    for (i = 0; i < response.length; i++) {
                        row += '<tr>' +
                            '<td>' + response[i].id + '</td>' +
                            '<td>' + response[i].name + '</td>' +
                            '<td>' + response[i].od + '</td>' +
                            '<td><img src="img/' + response[i].photo + '" alt="' + response[i].photo + '"></td>' +
                            '<td>' + response[i].status + '</td>' +
                            '<td>' + btnedit + btndelete + '</td>' +
                            // '<td>'++'</td>'+
                            '</tr>';
                        // tbldata.append(row);
                    }
                    tbldata.html(tr + row);
                    // s = s + parseInt(e.val());
                }
            });
        }

        function editcategorie(eThis) {
            var parent = eThis.parents('tr'); // Get the parent row of the button
            var id = parent.find('td:eq(0)').text();
            var name = parent.find('td:eq(1)').text();
            var od = parent.find('td:eq(2)').text();
            var photo = parent.find('td:eq(3) img').attr('alt');
            var status = parent.find('td:eq(4)').text();
            // var img = body.find('#txt-img').val();
            // alert(photo );

            // Update the form fields with the extracted data
            body.find('.frm #txt-edit').val(id);
            body.find('.frm #txt-ID').val(id);
            body.find('.frm #txt-Name').val(name);
            body.find('.frm #txt-od').val(od);
            body.find('.frm #txt-img').val(photo);
            body.find('.frm .img-box').css('background-image', 'url(img/' + photo + ')');

            body.find('.frm #txt-select').val(status);
        }


        // get Auto Id 
        function getautoid() {

            $.ajax({
                type: "POST",
                url: "Action/Get_Auto_id.php",
                data: {
                    opt: frmInd
                },
                //processData: false,
                cache: false,
                //contentType:false,

                dataType: "json",
                beform: function(response) {

                },
                success: function(response) {
                    var id = $('#txt-ID').val(response.id);
                }
            });
        }
        // get category data


        function getusers() {
            var tr = '<tr>' +
                '<th >NO</th>' +
                '<th width="50px" >Photo</th>' +
                '<th>usersname</th>' +
                '<th>Phone Number</th>' +
                '<th>Email</th>' +
                '<th>Position</th>' +
                '<th>Create_Date</th>' +
                '<th>Action</th>'
            '</tr>';
            $.ajax({
                type: "POST",
                url: "Get/get-users-data.php",
                data: {
                    opt: e.val(),
                    s: s
                },
                // processData: false,
                cache: false,
                // contentType: false,
                dataType: "json",
                beform: function(response) {

                },
                success: function(response) {
                    // alert(response.name);
                    var row = '';
                    for (i = 0; i < response.length; i++) {
                        row += '<tr>' +
                            '<td>' + response[i].Id + '</td>' +
                            '<td><img src="img/' + response[i].photo + '" alt="' + response[i].photo + '"></td>' +
                            '<td>' + response[i].usersname + '</td>' +
                            '<td>' + response[i].phone + '</td>' +
                            '<td>' + response[i].email + '</td>' +
                            '<td>' + response[i].status + '</td>' +
                            '<td>' + response[i].create_date + '</td>' + // Adjust to match PHP response
                            '<td>' + btnedit + btndelete + '</td>' +
                            '</tr>';
                        // tbldata.append(row);
                    }
                    tbldata.html(tr + row);
                }
            });

            tbldata.html(tr);
        }

        function saveCustomer(eThis) {
            var frm = eThis.closest('form.upl');
            var form_data = new FormData(frm[0]);
            $.ajax({
                type: "POST",
                url: "Action/savechange.php",
                data: form_data,
                processData: false,
                cache: false,
                contentType: false,
                // dataType: "json",
                beform: function(response) {
                    // eThis.html(wait);

                },
                success: function(response) {
                    Countdata();
                    changepassword();
                    row += '<tr>' +
                        '<td>' + response[i].id + '</td>' +
                        '<td>' + response[i].usersname + '</td>' +
                        '<td>' + response[i].phone + '</td>' +
                        '<td>' + response[i].email + '</td>' +
                        '<td>' + response[i].Address + '</td>' +
                        '<td>' + response[i].Create_at + '</td>' +
                        '<td>' + btnedit + btndelete + '</td>' +
                        // '<td>'++'</td>'+
                        '</tr>';
                    // // alert(response.dpl);
                    tbldata.append(row);
                    //  $('.popup').remove();
                    // // GetSlideData();
                }
            });
        }
        // change  password
        function changepassword() {

            var tr = '<tr>' +
                '<th>ID</th>' +
                '<th>username</th>' +
                '<th>Phone</th>' +
                '<th>Email</th>' +
                '<th>Address</th>' +
                '<th>Create-Date</th>' +
                // '<th>Update-Date</th>' +
                '<th>Action</th>' +
                '</tr>';
            $.ajax({
                type: "POST",
                url: "Get/users-changepasswords.php",
                data: {
                    opt: e.val(),
                    s: s
                },
                // processData: false,

                // contentType: false,
                // processData: false,
                cache: false,
                // contentType: false,
                dataType: "json",
                beform: function(response) {

                },
                success: function(response) {
                    // alert(response.name);
                    var row = '';
                    for (i = 0; i < response.length; i++) {
                        row += '<tr>' +
                            '<td>' + response[i].id + '</td>' +
                            '<td>' + response[i].usersname + '</td>' +
                            '<td>' + response[i].phone + '</td>' +
                            '<td>' + response[i].email + '</td>' +
                            '<td>' + response[i].Address + '</td>' +
                            '<td>' + response[i].Create_at + '</td>' +
                            '<td>' + btnedit + btndelete + '</td>' +
                            // '<td>'++'</td>'+
                            '</tr>';
                        // tbldata.append(row);
                    }
                    tbldata.html(tr + row);
                }
            });
        }

        $('body').on('change', '.frm #txt-photo', function() {
            var eThis = $(this);
            var parent = eThis.parents('.frm');
            var frm = eThis.closest('form.upl');
            var form_data = new FormData(frm[0]);
            var img = parent.find('.img-box');
            var photo = parent.find('#txt-img');

            $.ajax({
                url: 'Action/upl-img.php',
                type: 'POST',
                data: form_data,
                contentType: false,
                cache: false,
                processData: false,
                dataType: 'json',
                beforeSend: function(response) {

                },
                success: function(response) {
                    photo.val(response.imgName);
                    img.css('background-image', "url(img/" + response.imgPath + ")");

                },
            });

        })
        $('#logoutBtn').click(function() {
            $.ajax({
                type: "POST",
                url: "Action/logout.php", // This will handle the logout on the server
                success: function(response) {
                    alert(response); // You can show a success message
                    window.location.href = "http://localhost/Project_shop/register.php"; // Redirect to login page after logout
                },
                error: function() {
                    alert("Error during logout.");
                }
            });
        });
    });
</script>

</html>