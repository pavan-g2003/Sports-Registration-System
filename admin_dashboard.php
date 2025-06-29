<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url("admindashboard.jpg");
            background-size: cover;
            color: white;
        }
        .sidebar {
            width: 200px;
            height: 100%;
            position: fixed;
            background-color: #333;
            padding-top: 20px;
            color: white;
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
        <a href="admin_dashboard.php">Home</a>
        <a href="view_applications.php">View Applications</a>
        <a href="logout.php">Logout</a>
    </div>
    <div class="content">
        <h1>Welcome to Admin Dashboard</h1>
    </div>
</body>
</html>
