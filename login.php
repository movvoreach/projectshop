<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="icon" href="Admin/img/icon.jpg" type="image/jpg">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f3f4f6;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        h2 {
            color: #333;
            text-align: center;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 400px;
            box-sizing: border-box;
            animation: fadeIn 0.3s ease-in-out;
            opacity: 0.9;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-size: 16px;
            color: #000;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
            box-sizing: border-box;
        }

        input[type="text"]:focus,
        input[type="password"]:focus {
            border-color: #007bff;
            outline: none;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            border: none;
            border-radius: 4px;
            color: white;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        input[type="submit"]:focus {
            outline: none;
        }

        .container {
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            background-image: url("https://spi.edu.kh/wp-content/uploads/slider/cache/71693bf026f04c628e1786b4291de82b/SPI-Campus-no-logo-Crop.png");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 10000;
            overflow: auto;
            padding-right: 15px;
            padding-left: 15px;
        }

        h2 img {
            margin-bottom: 40px;
            width: 280px;
            height: 70px;
            /* border-radius: 50%; */
            object-fit: cover;
        }

        .register-link {
            display: block;
            text-align: center;
            margin-top: 15px;
            font-size: 14px;
        }

        .register-link a {
            color: #007bff;
            text-decoration: none;
        }

        .register-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="container">
        <form class="btn-submit">
            <h2><img src="Admin/img/spi.png" alt=""></h2>
            <label for="username">Email</label>
            <input type="text" id="username" name="username" required><br><br>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required><br><br>
            <input type="submit" id="btn" value="Login">
            <div class="register-link">
                <p>Don't have an account? <a href="register.php">Register here</a></p>
            </div>
        </form>
    </div>

</body>

<script>
    $(document).ready(function() {
        $('#btn').click(function(event) {
            event.preventDefault();

            var username = $('#username').val();
            var password = $('#password').val();

            $.ajax({
                type: "POST",
                url: "http://localhost/Project_shop/Admin/Action/login.php",
                data: {
                    'username': username,
                    'password': password
                },
                beforeSend: function() {
                    console.log("Sending login request...");
                },
                success: function(response) {
                    // alert(response);
                    if (response === "Login successful") {
                        // Display SweetAlert on a successful login
                        swal({
                            // title: "Good job!",
                            text: "Login Successful!",
                            icon: "success",
                            button: "OK",
                            // Set height of the popup
                        }).then(() => {
                            // Redirect to Admin page after the user clicks OK
                            window.location.href = "http://localhost/Project_shop/Admin/Admin.php";
                        });
                    } else {
                        // Alert for a failed login
                        swal({
                            // title: "Oops!",
                            text: "Login failed. Please try again.",
                            icon: "error",
                            button: "OK",
                             // Set height of the popup
                        });
                    }

                },
                error: function() {
                    alert("There was an error with the request.");
                }
            });
        });
        
    });
</script>

</html>