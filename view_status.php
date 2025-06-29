<?php
session_start();
include('db_connection.php');

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    echo "<script>alert('Please login first!'); window.location.href='user_login.php';</script>";
    exit();
}

// Fetch the user's application status
$username = $_SESSION['username'];
$sql = "SELECT sport, status FROM student_applications WHERE name = ?"; // Updated table and column names

$stmt = $conn->prepare($sql);

if (!$stmt) {
    die("Error preparing statement: " . $conn->error); // Handle SQL errors
}

$stmt->bind_param("s", $username);
$stmt->execute();

$result = $stmt->get_result();

if (!$result) {
    die("Error fetching result: " . $stmt->error); // Handle errors from the execution
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Application Status</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
            background-color:rgb(91, 116, 30);
        }
        table {
            border-collapse: collapse;
            width: 80%;
            margin: 20px 0;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        th, td {
            text-align: left;
            padding: 12px;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #333;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>
    <h2>Your Application Status</h2>
    <?php if ($result->num_rows > 0): ?>
        <table>
            <tr>
                <th>Sport</th>
                <th>Status</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['sport']); ?></td>
                    <td><?php echo htmlspecialchars($row['status']); ?></td>
                </tr>
            <?php endwhile; ?>
        </table>
    <?php else: ?>
        <p>No application found for your account.</p>
    <?php endif; ?>
</body>
</html>
<?php
$stmt->close();
$conn->close();
?>
