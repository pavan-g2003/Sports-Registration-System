<?php
$servername = "localhost"; // Change this to your server address if not localhost
$username = "root"; // Replace with your database username
$password = ""; // Replace with your database password
$dbname = "sports_management_system"; // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
