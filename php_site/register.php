<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f7fa; /* Light Blue */
            margin: 0;
            padding: 0;
        }

        .container {
            background-color: #fff; /* White */
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 400px;
            margin: 40px auto;
        }

        h2 {
            color: #007bff; /* Blue */
        }

        form {
            margin-top: 20px;
        }

        label {
            color: #007bff; /* Blue */
            font-weight: bold;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"],
        select,
        input[type="date"] {
            width: 100%;
            padding: 10px;
            margin: 6px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="checkbox"] {
            margin-right: 5px;
        }

        input[type="submit"],
        button {
            background-color: #007bff; /* Blue */
            color: #fff; /* White */
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover,
        button:hover {
            background-color: #0056b3; /* Darker Blue */
        }

        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0,0,0,0.4);
        }

        .modal-content {
            background-color: #fefefe; /* Light Gray */
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            border-radius: 8px;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }

    </style>
</head>
<body>
    <div class="container">
        <h2>Register</h2>
        <form action="register_process.php" method="post">
            <label for="name">Name:</label><br>
            <input type="text" id="name" name="name" required><br>

            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" required><br>

            <label for="password">Password:</label><br>
            <input type="password" id="password" name="password" required><br>

            <label for="gender">Gender:</label><br>
            <select id="gender" name="gender" required>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="trans">Trans</option>
                <option value="others">Other Stupid USA Woke People</option>
            </select><br>

            <label for="dob">Date of Birth:</label><br>
            <input type="date" id="dob" name="dob" required><br>

            <input type="checkbox" id="terms" name="terms" required>
            <label for="terms">I agree to the terms and conditions</label><br>

            <input type="submit" value="Register">
        </form>
        <div id="termsModal" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <h3>Terms and Conditions</h3>
                <p>For testing purposes only.</p>
            </div>
        </div>
        <button onclick="openModal()">Open Terms and Conditions</button>
    </div>

    <script>
        // JavaScript to open and close the modal
        function openModal() {
            var modal = document.getElementById('termsModal');
            modal.style.display = "block";
        }

        var closeBtn = document.getElementsByClassName("close")[0];
        closeBtn.onclick = function() {
            var modal = document.getElementById('termsModal');
            modal.style.display = "none";
        }

        window.onclick = function(event) {
            var modal = document.getElementById('termsModal');
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
</body>
</html>
