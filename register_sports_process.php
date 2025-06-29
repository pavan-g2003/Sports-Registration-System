<?php
session_start();
include('db_connection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $branch = $_POST['branch'];
    $email = $_POST['email'];
    $mobilenumber = $_POST['mobilenumber'];
    $sport = $_POST['sport'];

    $query = "INSERT INTO student_applications (name, branch, email, mobilenumber, sport, status) 
              VALUES ('$name', '$branch', '$email', '$mobilenumber', '$sport', 'pending')";
    mysqli_query($conn, $query);

    echo "<script>alert('Registration submitted successfully!'); window.location='user_dashboard.php';</script>";
}
?>
