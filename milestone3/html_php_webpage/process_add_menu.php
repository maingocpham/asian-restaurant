<?php
// Start the session (optional, depending on your setup)
session_start();

// Include the database connection file
include('config.php');  // Ensure this file contains your DB connection settings

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the form data (make sure to sanitize/validate inputs as needed)
    $item_name = $_POST['item_name'];
    $price = $_POST['price'];
    $category = $_POST['category'];
    $cuisine = $_POST['cuisine'];
    
    // Prepare the SQL query to insert the menu item
    $sql = "INSERT INTO MENU (item_name, price, category, cuisine) 
            VALUES (?, ?, ?, ?)";

    // Prepare the statement
    if ($stmt = $conn->prepare($sql)) {
        // Bind the parameters to the query (s = string)
        $stmt->bind_param("ssss", $item_name, $price, $category, $cuisine);

        // Execute the query and check for success
        if ($stmt->execute()) {
            // Add menu item successfully
            echo "Add menu item successfully!";
            // header('Location: add_menu_success.html');
        } else {
            // If there's an error, display the error message
            echo "Error: " . $stmt->error;
        }

        // Close the prepared statement
        $stmt->close();
    } else {
        echo "Error preparing the query: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
} else {
    // Redirect to the menu page if the form wasn't submitted
    header('Location: process_add_menu.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Menu Management - Asian Asian</title>
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

        form {
            margin-bottom: 20px;
        }

        label, select, input {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"], input[type="number"], select {
            padding: 8px;
            width: 100%;
            max-width: 400px;
            margin-right: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        button {
            padding: 10px 15px;
            background-color: #580808;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #af954c;
        }

        .hidden {
            display: none;
        }
    </style>
    <script>
        function toggleForm() {
            const formType = document.getElementById('form_type').value;
            const addMenuForm = document.getElementById('add_menu_form');
            const updateMenuForm = document.getElementById('update_menu_form');

            if (formType === 'add') {
                addMenuForm.classList.remove('hidden');
                updateMenuForm.classList.add('hidden');
            } else if (formType === 'update') {
                addMenuForm.classList.add('hidden');
                updateMenuForm.classList.remove('hidden');
            } else {
                addMenuForm.classList.add('hidden');
                updateMenuForm.classList.add('hidden');
            }
        }
    </script>
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
    <h1>Manage Menu Information</h1>
</header>

<div class="dashboard-container">
    <label for="form_type">Choose Action:</label>
    <select id="form_type" onchange="toggleForm()">
        <option value="">-- Select an Option --</option>
        <option value="add">Add New Menu Item</option>
        <option value="update">Update Menu Information</option>
    </select>

    <!-- Add New Menu Item Form -->
    <form id="add_menu_form" class="hidden" action="process_add_menu.php" method="POST">
        <h2>Add New Menu Item</h2>
        <label for="item_name">Item Name:</label>
        <input type="text" id="item_name" name="item_name" required>

        <label for="price">Price:</label>
        <input type="number" id="price" name="price" step="0.01" required>

        <label for="category">Category:</label>
        <input type="text" id="category" name="category" required>

        <label for="cuisine">Cuisine:</label>
        <input type="text" id="cuisine" name="cuisine" required>

        <button type="submit">Add Menu Item</button>
    </form>

    <!-- Update Menu Information Form -->
    <form id="update_menu_form" class="hidden" action="process_update_menu.php" method="POST">
        <h2>Update Menu Information</h2>
        <label for="item_id">Item ID:</label>
        <input type="text" id="item_id" name="item_id" required>

        <label for="item_name">Item Name (Leave blank to keep unchanged):</label>
        <input type="text" id="update_item_name" name="item_name">

        <label for="price">Price (Leave blank to keep unchanged):</label>
        <input type="number" id="update_price" name="price" step="0.01">

        <label for="category">Category (Leave blank to keep unchanged):</label>
        <input type="text" id="update_category" name="category">

        <label for="cuisine">Cuisine (Leave blank to keep unchanged):</label>
        <input type="text" id="update_cuisine" name="cuisine">

        <button type="submit">Update Menu Item</button>
    </form>
</div>

</body>
</html>
