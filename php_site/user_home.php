<?php
session_start();

// Check if user is logged in, if not redirect to login page
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

// Include database connection
require_once 'db.php';

// Fetch user details from database
$username = $_SESSION['username'];
$query = "SELECT * FROM users WHERE username='$username'";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);



// Fetch weather data from API
$weather_api_url = "YOUR_WEATHER_API_URL"; // Replace with your actual weather API URL
$weather_data = @file_get_contents($weather_api_url); // Use @ to suppress errors
if ($weather_data === false) {
    $temperature = "N/A"; // Set temperature to N/A if API request fails
} else {
    $weather = json_decode($weather_data, true);
    if ($weather && isset($weather['temperature'])) {
        $temperature = $weather['temperature'];
    } else {
        $temperature = "N/A"; // Set temperature to N/A if API returns invalid data
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Home</title>
    <style>
        /* Add your own CSS for styling */
    </style>
</head>
<body>
    <div class="container">
        <h2>Welcome, <?php echo $user['username']; ?></h2>
        <!-- You might need to adjust the path to the profile picture -->
        <img src="profile_picture.php" alt="Profile Picture" width="200" height="200">
        <p>Temperature: <?php echo $temperature; ?>°C</p>
        <!-- Add search functionality here -->
        <div class="search-box">
            <!-- Add search functionality here -->
        </div>
        <a href="logout.php">Logout</a>
    </div>
    </div>
    <!-- Logout Button -->
    <div style="text-align: center; margin-top: 20px;">
        <a href="logout.php">Logout</a>
    </div>
</body>
</html>
