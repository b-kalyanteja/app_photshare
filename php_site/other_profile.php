<?php
session_start();

// Include database connection
require_once 'db.php';

// Check if email parameter is present in the URL
if (isset($_GET['email'])) {
    $email = $_GET['email'];

    // Retrieve user information from the database
    $query = "SELECT * FROM userinfo WHERE Email = '$email'";
    $result = mysqli_query($conn, $query);

    // Check if user exists
    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
    } else {
        // User not found, handle error (redirect to error page or display message)
        echo "User not found";
        exit(); // Stop further execution
    }
} else {
    // Email parameter not provided, handle error (redirect to error page or display message)
    echo "Email parameter not provided";
    exit(); // Stop further execution
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        /* Add your CSS styles here */
        body {
            font-family: Arial, sans-serif;
            text-align: center;
        }
        .container {
            width: 80%;
            margin: 20px auto;
        }
        .profile-info {
            margin-bottom: 20px;
        }
        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .btn:hover {
            background-color: #0056b3;
        }
        /* Popup styles */
        .popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: rgba(0, 0, 0, 0.8);
            color: #fff;
            padding: 20px;
            border-radius: 5px;
        }
        .popup-btn {
            padding: 10px 20px;
            background-color: #0056b3;
            border: none;
            border-radius: 5px;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .popup-btn:hover {
            background-color: #004080;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>User Profile</h2>
        <div class="profile-info">
            <p><i class="fas fa-user"></i> <strong>Name:</strong> <?php echo $user['Name']; ?></p>
            <p><i class="fas fa-envelope"></i> <strong>Email:</strong> <?php echo $user['Email']; ?></p>
            <p><i class="fas fa-venus-mars"></i> <strong>Gender:</strong> <?php echo $user['Gender']; ?></p>
            <p><i class="fas fa-birthday-cake"></i> <strong>Date of Birth:</strong> <?php echo $user['DateOfBirth']; ?></p>
            <p><i class="fas fa-info-circle"></i> <strong>About:</strong> <?php echo $user['About']; ?></p>
            <!-- Add other user information here -->
        </div>
        <button class="btn" onclick="showPopup()">Add Friend</button>
        <a href="user_home.php">Home</a>
        <a href="logout.php">Logout</a>
    </div>

    <!-- Popup Message -->
    <div id="popup" class="popup">
        <p>This feature is yet to be implemented.</p>
        <p>Sorry, <?php echo $user['Name']; ?>!</p>
        <button class="popup-btn" onclick="hidePopup()">Close</button>
    </div>

    <!-- JavaScript to show/hide popup -->
    <script>
        function showPopup() {
            document.getElementById('popup').style.display = 'block';
        }

        function hidePopup() {
            document.getElementById('popup').style.display = 'none';
        }
    </script>
</body>
</html>
