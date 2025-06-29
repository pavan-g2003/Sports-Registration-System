<?php
// Start session management
session_start();
include('db_connection.php');

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    echo "<script>alert('Please login first!'); window.location.href='user_login.php';</script>";
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register for Sports</title>
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
            background: linear-gradient(135deg, #ff5e62, #ff9966); /* Gradient Background */
            background-size: cover;
            transition: background 0.5s ease-in-out;
            background-image: url("register.avif");
            background-size: cover;
        }

        .registration-container {
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

        input, select {
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

        input:focus, select:focus {
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

        /* Optional extra text for some more information */
        .extra-info {
            margin-top: 10px;
            color: #ccc;
            font-size: 14px;
        }

        .extra-info a {
            color: #ff9966;
            text-decoration: none;
        }

        .extra-info a:hover {
            color: #fff;
        }

    </style>
</head>
<body>
    <div class="registration-container" id="registrationContainer">
        <h2>Sports Registration</h2>
        <form action="register_sports_process.php" method="POST">
            <input type="text" name="name" placeholder="Name" required>
            <input type="text" name="branch" placeholder="Branch" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="text" name="mobilenumber" placeholder="Mobile Number" required>
            <select name="sport" required>
                <option value="" disabled selected>Select a sport</option>
                <option value="Cricket">Cricket</option>
                <option value="Football">Football</option>
                <option value="Basketball">Basketball</option>
                <option value="Badminton">Badminton</option>
                <option value="Tennis">Tennis</option>
                <option value="Hockey">Hockey</option>
                <option value="Swimming">Swimming</option>
            </select>
            <button type="submit">Register</button>
        </form>
        <div class="extra-info">
            <p>Need help? <a href="#">Contact Support</a></p>
        </div>
    </div>

    <script>
        window.onload = function() {
            document.getElementById('registrationContainer').classList.add('show');
        };
    </script>
</body>
</html>

