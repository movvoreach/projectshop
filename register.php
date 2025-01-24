<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link rel="icon" href="Admin/img/icon.jpg" type="image/jpg">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
            width: 100%;
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

        h2 {
            color: #333;
            text-align: center;
        }

        .form-container {
            background-color: rgba(255, 255, 255, 0.8);
            /* White background with 80% opacity */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            width: 500px;
            /* Reduced width for a smaller form */
            box-sizing: border-box;
            animation: fadeIn 0.5s ease-in-out;
            opacity: 0.9;
            /* Adjust the opacity of the form itself */
        }

        .form-container h2 img {
            margin-bottom: 15px;
            width: 200px;
            height: 60px;
            object-fit: cover;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-size: 16px;
            color: #000;
            /* Darker color for label text */
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            /* Reduced margin */
            border: 1px solid #007bff;
            /* Blue border color */
            border-radius: 8px;
            font-size: 16px;
            background-color: #e6f2ff;
            /* Light blue background color */
            box-sizing: border-box;
            transition: border-color 0.3s, background-color 0.3s;
        }

        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="password"]:focus {
            border-color: #0056b3;
            /* Darker blue border color on focus */
            outline: none;
            box-shadow: 0 0 8px rgba(0, 123, 255, 0.3);
            background-color: #d9eaff;
            /* Slightly darker background color on focus */
        }

        input[type="submit"] {
            width: 100%;
            padding: 12px;
            background-color: #007bff;
            /* Blue submit button */
            border: none;
            border-radius: 8px;
            color: white;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
            /* Darker blue when hovered */
        }

        .login-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
            color: #555;
        }

        .login-link a {
            color: #007bff;
            text-decoration: none;
        }

        .login-link a:hover {
            text-decoration: underline;
        }

        /* Styled role selection */
        .role-selection {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
            /* Reduced margin */
        }

        .role-selection label {
            margin-right: 10px;
            /* Reduced margin */
            font-size: 16px;
            color: #333;
        }

        .role-selection input[type="radio"] {
            margin-right: 8px;
            width: 20px;
            height: 20px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .role-selection input[type="radio"]:hover {
            background-color: #007bff;
            /* Highlighted on hover */
        }

        @keyframes fadeIn {
            0% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
        }

        /* Loading Spinner */
        .loading {
            display: none;
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="form-container">
            <h2><img src="Admin/img/spi.png" alt="SPI Logo"></h2>
            <form class="btn-submit" method="POST">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required><br>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required><br>

                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required><br>

                <label for="confirm-password">Confirm Password:</label>
                <input type="password" id="confirm-password" name="confirm-password" required><br>
<!-- 
                Admin or User Selection
                <div class="role-selection">
                    <label for="role">Role:</label>
                    <div>
                        <input type="radio" id="admin" name="role" value="admin" required>
                        <label for="admin">Admin</label>
                    </div>
                    <div>
                        <input type="radio" id="user" name="role" value="user" required>
                        <label for="user">User</label>
                    </div>
                </div> -->

                <input type="submit" id="register-btn" value="Register">
                <div class="loading" id="loading-spinner">Loading...</div> <!-- Spinner for loading state -->

                <div class="login-link">
                    <p>Already have an account? <a href="login.php">Login here</a></p>
                </div>
            </form>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#register-btn').click(function(event) {
                event.preventDefault(); // Prevent form from submitting normally

                var username = $('#username').val();
                var email = $('#email').val();
                var password = $('#password').val();
                var confirmPassword = $('#confirm-password').val();
                // var role = $('input[name="role"]:checked').val(); // Get selected role

                // Simple validation check
                if (password !== confirmPassword) {
                    alert("Passwords do not match.");
                    return;
                }

                // if (!role) {
                //     alert("Please select a role (Admin or User).");
                //     return;
                // }

                // Display loading spinner while sending request
                $('#loading-spinner').show();

                $.ajax({
                    type: "POST",
                    url: "http://localhost/Project_shop/Admin/Action/register.php",
                    data: {
                        'username': username,
                        'email': email,
                        'password': password,
                        // 'role': role
                    },
                    dataType: "json",
                    beforeSend: function() {
                        console.log("Sending registration request...");
                    },
                    success: function(response) {
                        $('#loading-spinner').hide(); // Hide loading spinner after response

                        if (response.status === 'success') {
                            alert("Registration successful");
                            window.location.href = "login.php"; // Redirect to login page after successful registration
                        } else {
                            alert("Registration failed: " + response.message);
                        }
                        //clear form
                        $('.btn-submit')[0].reset(); // Reset form
                    },
                    error: function() {
                        $('#loading-spinner').hide(); // Hide loading spinner in case of error
                        alert("There was an error with the request.");
                    }
                });
            });
        });
    </script>
</body>

</html>