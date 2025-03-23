<?php
// Start the session
session_start();

// Include database connection
include('config.php');

// Check if the user is logged in and is an admin
if (!isset($_SESSION['username'])) {
    header('Location: admin_login.php');
    exit();
}

// Function to fetch and display a table from the database with a search feature
function displayTable($conn, $tableName, $searchData) {
    // Extract search column and value for this table if provided
    $searchColumn = isset($searchData[$tableName]['column']) ? $searchData[$tableName]['column'] : '';
    $searchValue = isset($searchData[$tableName]['value']) ? $searchData[$tableName]['value'] : '';

    // Query to select all data or filter based on the search
    $sql = "SELECT * FROM $tableName";
    if (!empty($searchColumn) && !empty($searchValue)) {
        $sql .= " WHERE `$searchColumn` LIKE '%$searchValue%'";
    }
    $result = $conn->query($sql);

    // Fetch column names dynamically
    $columnNames = [];
    if ($result && $result->num_rows > 0) {
        $columnNames = array_keys($result->fetch_assoc());
        $result->data_seek(0); // Reset the result pointer
    } elseif ($result) {
        $columnNames = $conn->query("SHOW COLUMNS FROM $tableName")->fetch_all(MYSQLI_ASSOC);
    }

    // Render search form
    echo "<h2>" . ucfirst($tableName) . " Table</h2>";
    echo "<form method='post' style='margin-bottom: 20px;'>";
    echo "<label for='searchColumn'>Search By: </label>";
    echo "<select name='searchData[$tableName][column]'>";
    echo "<option value=''>--Select Column--</option>";
    foreach ($columnNames as $column) {
        $columnName = is_array($column) ? $column['Field'] : $column;
        $selected = $searchColumn === $columnName ? "selected" : "";
        echo "<option value='$columnName' $selected>" . ucfirst($columnName) . "</option>";
    }
    echo "</select>";
    echo "<input type='text' name='searchData[$tableName][value]' placeholder='Enter value' value='$searchValue'>";
    echo "<button type='submit'>Search</button>";
    echo "</form>";

    // Render table
    if ($result && $result->num_rows > 0) {
        echo "<table border='1' cellpadding='10' cellspacing='0'>";
        echo "<thead><tr>";
        foreach ($columnNames as $column) {
            $columnName = is_array($column) ? $column['Field'] : $column;
            echo "<th>" . ucfirst($columnName) . "</th>";
        }
        echo "<th>Action</th>";
        echo "</tr></thead><tbody>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            foreach ($row as $value) {
                echo "<td>" . htmlspecialchars($value) . "</td>";
            }

            // DELETE OPTION

            // Check if it's an 'orders', 'reservation', 'payment', 'staff' or 'menu' table
            if ($tableName == 'orders') {
                $idField = 'order_id'; // 'order_id' for the orders table
            } elseif ($tableName == 'reservation') {
                $idField = 'reservation_id'; // 'reservation_id' for the reservation table
            } elseif ($tableName == 'payment') {
                $idField = 'payment_id'; // 'payment_id' for the payment table
            } elseif ($tableName == 'staff') {
                $idField = 'staff_id'; // 'staff_id' for the staff table
            } elseif ($tableName == 'menu') {
                $idField = 'item_id';
            }

            // Add a delete button in the last column
            $idValue = $row[$idField]; // Using the correct field for each table
            echo "<td><form action='admin_delete_entry.php' method='post'>
                    <input type='hidden' name='$idField' value='$idValue'>
                    <button type='submit' onclick='return confirm(\"Are you sure you want to delete this entry?\");'>Delete</button>
                </form></td>";
            echo "</tr>";
        }
        echo "</tbody></table>";

    } else {
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
    <title>Admin Dashboard - Asian Asian</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: black;
        }

        nav {
            background-color: #580808;
            padding: 10px 20px;
        }

        nav a {
            color: white;
            padding: 14px 20px;
            text-decoration: none;
            font-size: 1.2em;
        }

        nav a:hover {
            background-color: #af954c;
        }

        h1 {
            text-align: center;
            margin-top: 40px;
        }

        .dashboard-container {
            width: 90%;
            margin: 20px auto;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 40px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #580808;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }
    </style>
</head>
<body>

<nav>
    <a href="admin_dashboard.php">Dashboard</a>
    <a href="admin_order.html">Make Order</a>
    <a href="admin_reservation.html">Reservations</a>
    <a href="change_staff.html">Staff</a>
    <a href="admin_menu.html">Menu</a>
    <a href="admin_payment.html">Payment</a>
    <a href="logout_admin.php">Logout</a>
</nav>

<header>
    <h1>Admin Dashboard</h1>
</header>

<div class="dashboard-container">
    <h2>Welcome, <?php echo $_SESSION['username']; ?>!</h2>
    <p>You have access to manage the following tables:</p>
    
    <?php
    // Process search data
    $searchData = isset($_POST['searchData']) ? $_POST['searchData'] : [];

    // Display the data for each table
    $tables = ['payment', 'staff', 'orders', 'reservation', 'menu'];
    foreach ($tables as $tableName) {
        displayTable($conn, $tableName, $searchData);
    }
    ?>
</div>

</body>
</html>
