<?php
session_start();
include('db_connection.php'); // Ensure database connection.

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Prepared statement for security
    $query = "SELECT * FROM user_credentials WHERE username = ?";
    $stmt = $conn->prepare($query);

    if ($stmt) {
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();

            // Verify the password
            if (password_verify($password, $user['password'])) {
                $_SESSION['username'] = $user['username'];
                echo "<script>alert('Login successful! Redirecting to dashboard.'); window.location.href='user_dashboard.php';</script>";
            } else {
                echo "<script>alert('Invalid password.'); window.location.href='user_login.php';</script>";
            }
        } else {
            echo "<script>alert('User not found.'); window.location.href='user_login.php';</script>";
        }

        $stmt->close();
    } else {
        echo "<script>alert('Database error. Please try again later.'); window.location.href='user_login.php';</script>";
    }

    $conn->close();
}
?>
