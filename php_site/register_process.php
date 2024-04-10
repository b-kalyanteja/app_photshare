<?php
// Include database connection
require_once 'db.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    
    // Hash the password for security
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Check if the terms checkbox is checked
    if (!isset($_POST['terms'])) {
        // Handle error - terms not accepted
        // For simplicity, you can redirect back to the registration page with an error message
        header("Location: register.php?error=terms_not_accepted");
        exit();
    }

    // SQL query to insert user data into the database
    $query = "INSERT INTO userinfo (Name, Email, Password, Gender, DateOfBirth) VALUES ('$name', '$email', '$hashed_password', '$gender', '$dob')";
    if (mysqli_query($conn, $query)) {
        // Registration successful

        // SQL query to create a new table for user's friends, requests, and messages
        $create_table_query = "CREATE TABLE $email (
            email VARCHAR(255) PRIMARY KEY,
            friends TEXT,
            requests TEXT,
            messages TEXT
        )";
        if (mysqli_query($conn, $create_table_query)) {
            // Table creation successful
            // Redirect to a success page or user home page
            header("Location: user_home.php");
            exit();
        } else {
            // Handle error - table creation failed
            // For simplicity, you can redirect back to the registration page with an error message
            header("Location: register.php?error=table_creation_failed");
            exit();
        }
    } else {
        // Handle error - registration failed
        // For simplicity, you can redirect back to the registration page with an error message
        header("Location: register.php?error=registration_failed");
        exit();
    }
} else {
    // Handle error - form not submitted
    // For simplicity, you can redirect back to the registration page with an error message
    header("Location: register.php?error=form_not_submitted");
    exit();
}
?>
