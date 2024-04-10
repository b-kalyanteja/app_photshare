<?php
// MySQL database credentials from Azure MYSQL in rg cloud_kalyan
$host = "172.212.40.210"; // MySQL service name in Kubernetes
$username = "root"; 
$password = "Alpha@123";
$database = "site";
$port = 3306; // Default MySQL port

// Create connection
$conn = new mysqli($host, $username, $password, $database, $port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



?> 
