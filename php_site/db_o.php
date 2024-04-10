<?php
// MySQL database credentials from Azure MYSQL in rg cloud_kalyan
$host = "socialmediav1.mysql.database.azure.com"; // MySQL service name in Kubernetes
$username = "kalyanteja"; 
$password = "Madras@1900";
$database = "userinfo";
$port = 3306; // Default MySQL port

// Create connection
$conn = new mysqli($host, $username, $password, $database, $port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


// MySQL database credentials - currently using Azure Mysql
// server nasme : socailmediav1
// user : kalyanteja
// password : Madras@1900

?> 
