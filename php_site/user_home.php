<?php
session_start();

// Check if user is logged in, if not redirect to login page
if (!isset($_SESSION['email'])) {
    header("Location: index.php");
    exit();
}

// Include database connection
require_once 'db.php'; // Make sure this file contains your database connection code

// Fetch user details from database using email
$email = $_SESSION['email'];
$query = "SELECT * FROM userinfo WHERE Email=?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "s", $email);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$user = mysqli_fetch_assoc($result);

// Handle about information update
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $about = htmlspecialchars($_POST['about']); // Sanitize input
    $update_query = "UPDATE userinfo SET About=? WHERE Email=?";
    $stmt = mysqli_prepare($conn, $update_query);
    mysqli_stmt_bind_param($stmt, "ss", $about, $email);
    if (mysqli_stmt_execute($stmt)) {
        // About information updated successfully
        header("Location: user_home.php");
        exit();
    } else {
        // Handle error - About information update failed
        echo "Error updating about information: " . mysqli_error($conn);
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
        .container {
            text-align: center;
            margin-top: 50px;
        }
        .about-section {
            margin-bottom: 20px;
        }
        textarea {
            width: 80%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
        }
        a {
            display: block;
            margin-top: 20px;
            color: #007bff;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Welcome, <?php echo htmlspecialchars($user['Name']); ?></h2>
        <div class="about-section">
            <h3>About Me</h3>
            <?php if (empty($user['About'])): ?>
                <p>No information available. Click the button to add about information.</p>
            <?php else: ?>
                <p><?php echo htmlspecialchars($user['About']); ?></p>
            <?php endif; ?>
            <button onclick="showEditForm()">Edit</button>
            <!-- Edit form (hidden by default) -->
            <form id="editForm" method="post" style="display: none;">
                <textarea name="about" rows="4" cols="50"><?php echo htmlspecialchars($user['About']); ?></textarea><br>
                <input type="submit" value="Save">
                <button type="button" onclick="hideEditForm()">Cancel</button>
            </form>
        </div>
        <form action="search_list.php" method="GET">
            <input type="text" name="search" placeholder="Enter name">
            <button type="submit">Search</button>
        </form>
        <a href="logout.php">Logout</a>
    </div>

    <script>
        function showEditForm() {
            document.getElementById("editForm").style.display = "block";
        }

        function hideEditForm() {
            document.getElementById("editForm").style.display = "none";
        }
    </script>
</body>
</html>
