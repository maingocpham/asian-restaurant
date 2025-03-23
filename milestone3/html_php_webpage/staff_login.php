<?php
// staff_login.php

// Start the session
session_start();

// Include the database connection file
include('config.php'); // Make sure this file contains your DB connection settings

// Initialize an error variable for displaying error messages
$error = "";

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the entered username and password
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query the database to check if the staff credentials are correct
    $sql = "SELECT * FROM staff WHERE staff_username = '$username'";  // Use staff_username for the staff table
    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_array($result, MYSQLI_ASSOC);

    if ($result->num_rows > 0) {
        // Check if the password matches the one in the database
        echo $password . " " . $user['password']; // Debugging line to verify the password
        if ($password == $user['password']) {
            // Set session variables for the logged-in staff
            $_SESSION['username'] = $username;
            // $_SESSION['role'] = 'staff'; // You can add more session data if needed

            // Redirect to the staff dashboard (change this to the appropriate page)
            header('Location: staff_dashboard.php');
            exit();
        } else {
            // If password is incorrect, display an error message
            $error = "Invalid password!";
        }
    } else {
        // If no matching user found, display an error message
        $error = "Invalid username or role!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Staff Login - Asian Asian</title>
    <style>
        /* Same styling as the admin login page */
        body {
            font-family: Arial, sans-serif;
            color: black;
            background-color: #f4f4f4;
        }

        nav {
            display: flex;
            align-items: center;
            background-color: #580808;
            padding: 10px 20px;
        }

        .nav-links {
            display: flex;
            justify-content: center;
            flex-grow: 1;
        }

        nav a {
            color: white;
            padding: 14px 20px;
            text-decoration: none;
            font-size: 1.2em;
            display: inline-block;
        }

        .dropdown {
            position: absolute;
            top: 17px;
            right: 17px;
        }

        .dropbtn {
            background-color: #ae881f;
            color: white;
            padding: 14px 20px;
            font-size: 1.2em;
            border: none;
            cursor: pointer;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f1f1f1;
            min-width: 65px;
            box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content a:hover {
            background-color: #ddd;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .dropdown:hover .dropbtn {
            background-color: #3e8e41;
        }

        h1 {
            text-align: center;
            margin-top: 40px;
        }

        .login-container {
            width: 30%;
            margin: 50px auto;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }

        .login-container input[type="text"], .login-container input[type="password"] {
            width: 94%;
            padding: 12px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .login-container input[type="submit"] {
            background-color: #580808;
            color: white;
            padding: 14px;
            font-size: 1.2em;
            border: none;
            cursor: pointer;
            width: 100%;
            border-radius: 4px;
        }

        .login-container input[type="submit"]:hover {
            background-color: #af954c;
        }

        .error {
            color: red;
            font-size: 1.1em;
            margin-top: 10px;
        }

    </style>
</head>
<body>

    <nav>
        <a href="home.html">Home</a>
        <a href="menu.php">Menu</a>
        <a href="reservation.html">Reservations</a>

        <div class="dropdown">
            <button class="dropbtn">Login</button>
            <div class="dropdown-content">
                <a href="staff_login.php">Staff</a>
                <a href="admin_login.php">Admin</a>
            </div>
        </div>
    </nav>

    <header>
        <h1>Staff Login</h1>
    </header>

    <div class="login-container">
        <!-- Display error message if login fails -->
        <?php if (isset($error)) { echo "<p class='error'>$error</p>"; } ?>

        <form action="staff_login.php" method="POST">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <input type="submit" value="Login">
        </form>
    </div>

</body>
</html>