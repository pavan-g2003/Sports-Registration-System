<!DOCTYPE html>
<html>
<head>
    <title>User Sign Up</title>
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
            background: linear-gradient(135deg, #ff5e62, #ff9966); /* Gradient background */
            background-size: cover;
            transition: background 0.5s ease-in-out;
            background-image: url("signup.avif");
            background-size: cover;
        }

        .signup-container {
            background: rgba(0, 0, 0, 0.7); /* Dark background with transparency */
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

        input {
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

        input:focus {
            border-color: #ff9966;
            background-color: #444;
            transform: scale(1.05); /* Slight zoom effect */
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
            transform: translateY(-5px); /* Hover effect: button moves up */
        }

        button:active {
            background-color: #e64a19;
            transform: translateY(2px); /* Button presses down */
        }

        .signup-container p {
            color: #ccc;
            text-align: center;
            margin-top: 15px;
        }

        .signup-container a {
            color: #ff9966;
            text-decoration: none;
            transition: color 0.3s;
        }

        .signup-container a:hover {
            color: #fff;
        }

    </style>
</head>
<body>
    <div class="signup-container" id="signupContainer">
        <h2>User Sign Up</h2>
        <form action="user_signup_process.php" method="POST">
            <input type="text" name="username" placeholder="Username" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="text" name="mobilenumber" placeholder="Mobile Number" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Sign Up</button>
        </form>
        <p>Already have an account? <a href="user_login.php">Login</a></p>
    </div>

    <script>
        window.onload = function() {
            document.getElementById('signupContainer').classList.add('show');
        };
    </script>
</body>
</html>
