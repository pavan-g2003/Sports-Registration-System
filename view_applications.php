<?php
session_start();
include('db_connection.php');

// Check if the admin is logged in
if (!isset($_SESSION['admin'])) {
    echo "<script>alert('Please login first!'); window.location.href='admin_login.php';</script>";
    exit();
}

// Fetch all user applications
$sql = "SELECT id, name, sport, status FROM student_applications";
$result = $conn->query($sql);

// Check for SQL query errors
if (!$result) {
    die("Error fetching data: " . $conn->error);
}

// Handle status updates (Approve/Reject)
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $status = $_POST['status'];

    $update_sql = "UPDATE student_applications SET status = ? WHERE id = ?";
    $stmt = $conn->prepare($update_sql);
    if (!$stmt) {
        die("Error preparing statement: " . $conn->error);
    }
    $stmt->bind_param("si", $status, $id);
    if ($stmt->execute()) {
        echo "<script>alert('Status updated successfully! Notification sent to user.'); window.location.href='view_applications.php';</script>";
    } else {
        echo "<script>alert('Failed to update status. Please try again.');</script>";
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Applications</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
            background-color:rgb(169, 196, 108);
        }
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
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
        form {
            display: inline;
        }
        button {
            padding: 5px 10px;
            margin: 0 5px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
        .approve {
            background-color: #4CAF50;
            color: white;
        }
        .reject {
            background-color: #f44336;
            color: white;
        }
    </style>
</head>
<body>
    <h1>Admin: View Applications</h1>
    <?php if ($result->num_rows > 0): ?>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Sport</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo htmlspecialchars($row['name']); ?></td>
            <td><?php echo htmlspecialchars($row['sport']); ?></td>
            <td>
                <?php 
                echo htmlspecialchars($row['status']);
                if ($row['status'] === 'approved') {
                    echo " (User notified: Approved)";
                } elseif ($row['status'] === 'rejected') {
                    echo " (User notified: Rejected)";
                }
                ?>
            </td>
            <td>
                <form method="POST">
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    <button type="submit" name="status" value="approved" class="approve">Approve</button>
                    <button type="submit" name="status" value="rejected" class="reject">Reject</button>
                </form>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
    <?php else: ?>
        <p>No applications found.</p>
    <?php endif; ?>
</body>
</html>
<?php
$conn->close();
?>
