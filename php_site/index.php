<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home page/title>
    <style>
        /* CSS for styling */
        /* Add your own CSS for styling */
    </style>
</head>
<body>
    <div class="container">
        <img src="/images/logo.png" alt="Logo" width="250" height="250">
        <h2>Login</h2>
        <form action="login.php" method="post">
            <label for="username">Username:</label><br>
            <input type="text" id="username" name="username" required><br>
            <label for="password">Password:</label><br>
            <input type="password" id="password" name="password" required><br>
            <input type="submit" value="Login">
        </form>
              
    </div>
    <a href="register.php">Register</a>
    <div class ="new">

    </div>
</body>
</html>
