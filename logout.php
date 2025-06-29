<?php
session_start();
session_destroy();
header('Location: sports.php'); // Main dashboard
?>
