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

        .box {
            width: 200px;
            height: 150px;
            margin-left: 30px;
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: #000;
            font-size: 18px;
            font-weight: bold;
            padding: 15px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .box i {
            font-size: 30px;
            margin-bottom: 10px;
        }

        .box .total {
            font-size: 16px;
            margin-top: 5px;
            font-weight: normal;
        }

        .box:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
        }
    </style>
    <!-- <style>
        
    </style> -->
</head>

<body>