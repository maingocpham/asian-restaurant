<?php
// Start the session
session_start();

// Include database connection
include('config.php');

// Function to fetch and display a table from the database
function displayTable($conn, $tableName) {
    // Query to select all data from the specified table
    $sql = "SELECT * FROM $tableName";
    $result = $conn->query($sql);

    // Check if the table has any rows
    if ($result->num_rows > 0) {
        // Get the column names dynamically
        $fields = $result->fetch_fields();
        
        // Start the table and print the column headers
        echo "<table border='1' cellpadding='10' cellspacing='0'>";
        echo "<thead><tr>";
        
        // Print each column header except for "item_id"
        foreach ($fields as $field) {
            if ($field->name != 'item_id') {
                echo "<th>" . ucfirst($field->name) . "</th>";
            }
        }
        echo "</tr></thead><tbody>";
        
        // Print each row of data, excluding the "item_id" field
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            foreach ($row as $key => $value) {
                if ($key != 'item_id') {
                    echo "<td>" . htmlspecialchars($value) . "</td>";
                }
            }
            echo "</tr>";
        }
        echo "</tbody></table>";
    } else {
        // If the table is empty
        echo "<p>No data available in the " . ucfirst($tableName) . " table.</p>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Menu - Asian Asian</title>
    <style>
        /* Same styles as the homepage */
        body {
            font-family: Arial, sans-serif;
            color: black;
            background-color: #f4f4f4;
        }

        /* Navigation bar */
        nav {
            display: flex;
            align-items: center;  /* Vertically center the items */
            background-color: #580808;
            padding: 10px 20px;  /* Padding around the navbar */
        }

        /* Center the links (Home, Menu, Reservations) */
        .nav-links {
            display: flex;
            justify-content: center;  /* Horizontally center the links */
            flex-grow: 1;  /* Make the links container take up available space */
        }

        /* Style the links inside the nav bar */
        nav a {
            color: white;
            padding: 14px 20px;
            text-decoration: none;
            font-size: 1.2em;
            display: inline-block;
        }

        /* Dropdown container for the login button */
        .dropdown {
            position: absolute;
            top: 17px;  
            right: 17px; /* Adjust the distance from the right */
        }

        /* Style the dropdown button */
        .dropbtn {
            background-color: #af954c;
            color: white;
            padding: 14px 20px;
            font-size: 1.2em;
            border:none;
            cursor: pointer;
        }

        /* Dropdown content (hidden by default) */
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f1f1f1;
            min-width: 65px;
            box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        /* Links inside the dropdown */
        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        /* Change color of links on hover */
        .dropdown-content a:hover {
            background-color: #ddd;
        }

        /* Show the dropdown content when hovering */
        .dropdown:hover .dropdown-content {
            display: block;
        }

        /* Change the dropdown button color when hovering */
        .dropdown:hover .dropbtn {
            background-color: #3e8e41;
        }

        /* Center heading */
        h1 {
            text-align: center;
            margin-top: 40px;
        }

        /* Section Titles */
        .section-title {
            text-align: center;
            color: white;
            padding: 10px;
            margin-top: 20px;
            font-size: 1.5em;
            width: 78.5%; /* Match width of the table */
            margin-left: 10%; /* Center the section title */
        }

        /* Appetizers Section */
        .appetizers-title {
            background-color: #af954c;
        }

        /* Entrees Section */
        .entrees-title {
            background-color: #af954c;
        }

        /* Soups Section */
        .soups-title {
            background-color: #af954c;
        }

        /* Desserts Section */
        .desserts-title {
            background-color: #af954c;
        }

        /* Table styling */
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
        }

        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: center;
        }

        th {
            background-color: #580808;
            color: white;
        }

        td {
            background-color: #f9f9f9;
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
    <h1>Our Menu</h1>
</header>

<div class="dashboard-container">
    <?php
    // Display the data for the menu table
    displayTable($conn, 'menu');
    ?>
</div>

</body>
</html>
