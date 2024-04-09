<?php
session_start();

// Include database connection
require_once 'db.php'; // Make sure this file contains your database connection code

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['email'], $_POST['password'])) {
    // Retrieve form data
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Construct the SQL query string with the email value
    $query = "SELECT * FROM userinfo WHERE Email = '$email' LIMIT 1";

    // Execute the query
    $result = mysqli_query($conn, $query);

    // Check if the query executed successfully
    if ($result && $user = mysqli_fetch_assoc($result)) {
        // User found, verify password
        if (password_verify($password, $user['Password'])) {
            // Password is correct, set session variables
            $_SESSION['email'] = $user['Email'];
            // Redirect to user home page
            header("Location: user_home.php");
            exit();
        } else {
            // Invalid password
            header("Location: login.php?error=invalid_password");
            exit();
        }
    } else {
        // User not found or error occurred
        header("Location: login.php?error=user_not_found");
        exit();
    }
} else {
    // Handle error - form not submitted or email/password not provided
    header("Location: login.php?error=form_not_submitted");
    exit();
}
?>
