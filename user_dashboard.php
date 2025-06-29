<?php
session_start();
if (!isset($_SESSION['username'])) {
    echo "<script>alert('Please login first!'); window.location.href='user_login.php';</script>";
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>User Dashboard</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-image: url("userdashboard.jpg");
            background-size: cover;
            color: white;
        }
        .sidebar {
            width: 200px;
            height: 100%;
            position: fixed;
            background-color: #333;
            padding-top: 20px;
        }
        .sidebar a {
            display: block;
            color: white;
            padding: 15px;
            text-decoration: none;
        }
        .sidebar a:hover {
            background-color: #575757;
        }
        .content {
            margin-left: 220px;
            padding: 20px;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <a href="user_dashboard.php">Home</a>
        <a href="register_for_sports.php">Register for Sports</a>
        <a href="view_status.php">View Status</a>
        <a href="logout.php">Logout</a>
    </div>
    <div class="content">
        <h1>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>
        <p>This is your user dashboard where you can navigate through the menu options.</p>
    </div>
</body>
</html>
