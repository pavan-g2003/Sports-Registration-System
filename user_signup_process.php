<?php
include('db_connection.php'); // Ensure this file is correctly set up for database connection.

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get user input and sanitize it
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $mobilenumber = trim($_POST['mobilenumber']);
    $password = trim($_POST['password']);

    // Validate required fields
    if (empty($username) || empty($email) || empty($mobilenumber) || empty($password)) {
        echo "<script>alert('All fields are required.'); window.history.back();</script>";
        exit();
    }

    // Check if email already exists
    $check_query = "SELECT * FROM user_credentials WHERE email = ?";
    $check_stmt = $conn->prepare($check_query);
    $check_stmt->bind_param("s", $email);
    $check_stmt->execute();
    $check_stmt->store_result();

    if ($check_stmt->num_rows > 0) {
        echo "<script>alert('Email already exists. Try logging in.'); window.location.href='user_login.php';</script>";
        exit();
    }
    $check_stmt->close();

    // Hash the password securely
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // Use a prepared statement to insert user data
    $query = "INSERT INTO user_credentials (username, email, mobilenumber, password) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($query);

    if ($stmt) {
        $stmt->bind_param('ssss', $username, $email, $mobilenumber, $hashed_password);

        if ($stmt->execute()) {
            echo "<script>alert('Registration successful! Redirecting to login...'); window.location.href='user_login.php';</script>";
            exit();
        } else {
            echo "<script>alert('Error: " . $stmt->error . "');</script>";
        }

        $stmt->close();
    } else {
        echo "<script>alert('Error: Could not prepare the statement.');</script>";
    }

    $conn->close();
}
?>
