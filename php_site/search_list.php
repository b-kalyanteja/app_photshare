<?php
session_start();

// Check if user is logged in, if not redirect to login page
if (!isset($_SESSION['email'])) {
    header("Location: index.php");
    exit();
}

// Include database connection
require_once 'db.php';

// Check if search query is present
if (isset($_GET['search'])) {
    $search = $_GET['search'];

    // Perform search query
    $query = "SELECT * FROM userinfo WHERE Name LIKE '%$search%'";
    $result = mysqli_query($conn, $query);

    // Check if there are any results
    if (mysqli_num_rows($result) > 0) {
        // Start output buffering to capture HTML output
        ob_start();
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Search Results</title>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    text-align: center; /* Align all content in the center */
                }
                .container {
                    width: 80%;
                    margin: 20px auto;
                }
                .result-container {
                    margin-top: 20px;
                }
                .result {
                    font-size: 18px;
                    font-weight: bold;
                    margin-bottom: 10px;
                    padding: 10px;
                    border: 1px solid #ccc; /* Add border around each result */
                    border-radius: 5px; /* Add border radius */
                    display: block; /* Ensure each result is displayed as a block element */
                    text-align: left; /* Align content within each result to the left */
                }
                .result a {
                    color: #007bff;
                    text-decoration: none;
                }
                .result img {
                    vertical-align: middle;
                    margin-right: 10px;
                }
                .main-image {
                    max-width: 300px;
                    margin: 0 auto 20px; /* Center the main image */
                    display: block;
                }
                .heading {
                    font-size: 24px;
                    font-weight: bold;
                    margin-bottom: 10px;
                }
            </style>
        </head>
        <body>
            <div class="container">
                <h2 class="heading">Hey, are you looking for anyone here?</h2>
                <img src="images/search01.jpeg" alt="ABC Image" class="main-image">
                <div class="result-container">
                    <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <div class="result">
                            <img src="images/profilelogo.jpeg" alt="Search Icon" width="20">
                            <a href="other_profile.php?email=<?php echo $row['Email']; ?>"><?php echo $row['Name']; ?></a>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </body>
        </html>
        <?php
        // End output buffering and store the output in a variable
        $output = ob_get_clean();

        // Display the HTML output
        echo $output;
    } else {
        echo "No results found";
    }
}
?>
