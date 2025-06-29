<!DOCTYPE html>
<html>
<head>
    <title>User Login</title>
    <style>
        /* Global Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Roboto', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(135deg, #ff5e62, #ff9966); /* New Gradient background */
            background-size: cover;
            transition: background 0.5s ease-in-out; /* Smooth transition for background */
            background-image: url("userlogin.jpg");
        }

        .login-container {
            background: rgba(0, 0, 0, 0.7); /* Dark transparent background for contrast */
            padding: 40px;
            border-radius: 30px;
            box-shadow: 0px 6px 15px rgba(0, 0, 0, 0.3);
            width: 100%;
            max-width: 400px;
            text-align: center;
            opacity: 0;
            animation: slideIn 1s ease-out forwards;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        h2 {
            font-size: 30px;
            color: #fff;
            margin-bottom: 20px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 2px;
            animation: fadeInText 1.5s ease-in-out forwards;
        }

        @keyframes fadeInText {
            0% {
                opacity: 0;
            }
            100% {
                opacity: 1;
            }
        }

        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 15px;
            margin: 15px 0;
            border-radius: 50px;
            border: 2px solid #ddd;
            outline: none;
            background-color: #333;
            color: #fff;
            font-size: 16px;
            transition: 0.3s;
        }

        input[type="text"]:focus, input[type="password"]:focus {
            border-color: #ff9966; /* Green border on focus */
            background-color: #444; /* Slightly darker background */
            transform: scale(1.05); /* Slight zoom effect */
        }

        button {
            width: 100%;
            padding: 15px;
            border-radius: 50px;
            border: none;
            background-color: #ff5e62; /* Button color */
            color: white;
            font-size: 18px;
            cursor: pointer;
            transition: 0.3s;
        }

        button:hover {
            background-color: #ff9966; /* Slightly darker color on hover */
            transform: translateY(-5px); /* Hover effect: button moves up */
        }

        button:active {
            background-color: #e64a19; /* Darker color on click */
            transform: translateY(2px); /* Button presses down */
        }

        .login-container .forgot-password {
            margin-top: 10px;
            color: #ccc;
            font-size: 14px;
            text-decoration: none;
            transition: color 0.3s;
        }

        .login-container .forgot-password:hover {
            color: #fff; /* Change text color on hover */
        }

        /* Background image input (optional) */
        .background-image-upload {
            margin-top: 20px;
            color: #ccc;
            font-size: 14px;
        }

        .background-image-upload input[type="file"] {
            background-color: transparent;
            border: none;
            color: #fff;
            cursor: pointer;
        }

    </style>
</head>
<body>
    <div class="login-container" id="loginContainer">
        <h2>User Login</h2>
        <form action="user_login_process.php" method="POST">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
        <a href="#" class="forgot-password">Forgot password?</a>
    </div>

    <script>
        // On page load, the login container becomes visible
        window.onload = function() {
            document.getElementById('loginContainer').classList.add('show');
        };
    </script>
</body>
</html>
