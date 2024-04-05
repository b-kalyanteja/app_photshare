<?php
session_start();

// Include database connection
require_once 'db.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query to check user credentials
    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        // Authentication successful, redirect to user home page
        $_SESSION['username'] = $username;
        header("Location: user_home.php");
        exit();
    } else {
        // Authentication failed, redirect back to login page with error message
        $_SESSION['error'] = "Invalid username or password";
        header("Location: index.php");
        exit();
    }
}
?>
