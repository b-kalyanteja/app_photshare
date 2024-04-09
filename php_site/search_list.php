<?php
session_start();

// Check if user is logged in, if not redirect to login page
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

// Include database connection
require_once 'db.php';

// Check if search query is present
if (isset($_GET['search'])) {
    $search = $_GET['search'];

    // Perform search query
    $query = "SELECT * FROM users WHERE username LIKE '%$search%'";
    $result = mysqli_query($conn, $query);
    
    // Display search results
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<a href="others_profile.php?username=' . $row['username'] . '">' . $row['username'] . '</a><br>';
    }
}
?>
