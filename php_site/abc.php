<!DOCTYPE html>
<html>
<head>
    <title>Users List</title>
</head>
<body>

<h1>User List</h1>

<?php

// Database connection parameters
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

// Query to get users
$sql = "SELECT * FROM user";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<ul>";
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<li>" . $row["first_name"] . " " . $row["last_name"] . "</li>";
    }
    echo "</ul>";
} else {
    echo "0 results";
}

// Close connection
$conn->close();

?>

</body>
</html>
