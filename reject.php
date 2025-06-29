<?php
include('db_connection.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "UPDATE student_applications SET status = 'rejected' WHERE id = $id";
    mysqli_query($conn, $query);
    header('Location: view_applications.php');
}
?>
