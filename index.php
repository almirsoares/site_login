<?php
session_start();

// Include necessary files
include 'includes/config.php';
include 'includes/auth.php';

// Check if user is already logged in
if (isset($_SESSION['user_id'])) {
    header('Location: dashboard.php');
    exit();
}

// Display the login form or any other content
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Site Login</title>
</head>
<body>
    <h1>Welcome to Site Login</h1>
    <p>Please <a href="login.php">login</a> to continue.</p>
</body>
</html>