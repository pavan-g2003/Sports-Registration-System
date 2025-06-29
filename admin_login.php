<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
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
            background: linear-gradient(135deg, #ff5e62, #ff9966);
            background-size: cover;
            background-image: url("adminlogin.jpg");
            background-position: ;
        }

        .login-container {
            background: rgba(0, 0, 0, 0.7);
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
            border-color: #ff9966;
            background-color: #444;
            transform: scale(1.05);
        }

        button {
            width: 100%;
            padding: 15px;
            border-radius: 50px;
            border: none;
            background-color: #ff5e62;
            color: white;
            font-size: 18px;
            cursor: pointer;
            transition: 0.3s;
        }

        button:hover {
            background-color: #ff9966;
            transform: translateY(-5px);
        }

        button:active {
            background-color: #e64a19;
            transform: translateY(2px);
        }

        .login-container .forgot-password {
            margin-top: 10px;
            color: #ccc;
            font-size: 14px;
            text-decoration: none;
            transition: color 0.3s;
        }

        .login-container .forgot-password:hover {
            color: #fff;
        }

    </style>
</head>
<body>
    <div class="login-container" id="loginContainer">
        <h2>Admin Login</h2>
        <form action="admin_login_process.php" method="POST">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
        <a href="#" class="forgot-password">Forgot password?</a>
    </div>

    <script>
        window.onload = function() {
            document.getElementById('loginContainer').classList.add('show');
        };
    </script>
</body>
</html>
