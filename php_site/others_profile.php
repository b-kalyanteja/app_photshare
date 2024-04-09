<?php
session_start();

// Check if user is logged in, if not redirect to login page
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

// Include database connection
require_once 'db.php';

// Check if username is present in URL parameter
if (isset($_GET['username'])) {
    $username = $_GET['username'];

    // Fetch user details from database
    $query = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($result);

    // Display user profile information
    if ($user) {
        echo '<h2>' . $user['username'] . '\'s Profile</h2>';
        echo '<p>About: ' . $user['about'] . '</p>';
    } else {
        echo 'User not found.';
    }
} else {
    echo 'Username not specified.';
}
?>
