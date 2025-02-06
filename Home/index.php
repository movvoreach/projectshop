<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Computer</title>
    <!-- Jquery link -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <!-- Custom CSS -->
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            list-style-type: none;
        }

        .bar1 {
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 10px 0;
        }

        .logo-box {
            width: 40%;
            height: 70px;
            padding-bottom: 15px;
            display: flex;
            justify-content: space-around;
            align-items: center;
        }

        .logo-box a img {
            height: 50px;
            width: auto;
        }

        .search-box {
            border-radius: 5px;
            width: 70%;
            height: 40px;
            display: flex;
            align-items: center;
            padding: 0 10px;
            box-shadow: 1px 1px 4px 0 #888;
        }

        .search-box input {
            padding: 5px;
            width: 80%;
            height: 100%;
            border: none;
            outline: none;
            font-size: 16px;
        }

        .btn-search {
            background-color: red;
            padding: 10px;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 20%;
            width: 100px;
        }

        .btn-search i {
            color: white;
            font-size: 20px;
            margin-right: 20%;
        }

        .menu-bar {
            width: 100%;
            background-color: #5dade2;
            height: 100px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .menu {
            width: 80%;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 30px 0;
        }

        .menu ul {
            display: flex;
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .menu ul li {
            margin: 0 15px;
        }

        .menu ul li a {
            display: flex;
            align-items: center;
            text-decoration: none;
            flex-direction: column;
            color: white;
            font-weight: bold;
            padding: 15px;
        }

        .menu ul li a i {
            font-size: 18px;
        }

        /* Hover effect */
        .menu ul li a:hover {
            background-color: #2e86c1;
            border-radius: 8px;
            transition: background-color 0.3s ease-in-out;
        }

        .container {
            width: 100%;
            margin: auto;
        }

        .container .title-box {
            width: 100%;
            padding: 7px;
            font-size: 20px;
            font-weight: bold;
        }

        .item-container {
            display: flex;
            flex-wrap: wrap;
            row-gap: 15px;
            justify-content: space-between;
            box-sizing: border-box;
        }

        .itme-box {
            width: 23%;
            height: 400px;
            margin-right: 10px;
            background-color: yellow;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .box-img img {
            width: 100%;
            height: auto;
            border-radius: 5px 5px 0 0;
        }

        .box-content {
            padding: 10px;
            text-align: center;
        }

        .box-content h3 {
            margin-bottom: 10px;
        }

        .box-content p {
            margin-bottom: 10px;
        }

        .box-content button {
            background-color: red;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        .box-content button:hover {
            background-color: darkred;
        }
    </style>
</head>

<body>
    <div class="bar1">
        <div class="logo-box">
            <a href="">
                <img src="https://spi.edu.kh/wp-content/uploads/2024/04/SPI-logo-landscape.png">
            </a>
        </div>
        <div class="search-box">
            <input type="text" placeholder="Search...">
        </div>
        <div class="btn-search">
            <i class="fas fa-search"></i>
        </div>
    </div>
    <div class="menu-bar">
        <div class="menu">
            <ul>
                <li>
                    <a href="">
                        <i class="fa-solid fa-house"></i>
                        <span>Home</span>
                    </a>
                </li>
                <li>
                    <a href="">
                        <i class="fa-solid fa-laptop"></i>
                        <span>Laptop</span>
                    </a>
                </li>
                <li>
                    <a href="">
                        <i class="fa-solid fa-desktop"></i>
                        <span>Monitor</span>
                    </a>
                </li>
                <li>
                    <a href="">
                        <i class="fa-solid fa-keyboard"></i>
                        <span>Accesory</span>
                    </a>
                </li>
            </ul>
            <ul>
                <li>
                    <a href="">
                        <i class="fa-solid fa-phone"></i>
                        <span>016808238</span>
                    </a>
                </li>
                <li>
                    <a href="">
                        <i class="fa-solid fa-cart-plus"></i>
                        <span>Cart</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="container">
        <div class="title-box">
            Product Details
        </div>
        <div class="item-container">
            <div class="itme-box">
                <div class="box-img">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTGhOkTkriUg5NNdFQEJpQYhP3MWrDm3nin3g&s">
                </div>
                <div class="box-content">
                    <h3>Product Name</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tristique, nunc vel ornare malesuada, erat nulla faucibus velit, ac auctor neque velit in velit. Duis auctor, ipsum sed consectetur auctor, felis neque placerat ex, in convallis sapien mauris vitae ex.</p>
                    <p>Price: $1500</p>
                    <button>Add to Cart</button>
                </div>
            </div>
            <div class="itme-box">
                1
            </div>
            <div class="itme-box">
                1
            </div>
            <div class="itme-box">
                1
            </div>
            <div class="itme-box">
                1
            </div>
            <div class="itme-box">
                1
            </div>
            <div class="itme-box">
                1
            </div>
            <div class="itme-box">
                1
            </div>
        </div>
    </div>
</body>

</html>