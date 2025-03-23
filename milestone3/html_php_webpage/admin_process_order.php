<?php
// Start the session (optional, depending on your setup)
session_start();

// Include the database connection file
include('config.php');  // Ensure this file contains your DB connection settings

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the form data (make sure to sanitize/validate inputs as needed)
    $reservation_id = $_POST['reservation_id'];
    $staff_no = $_POST['staff_no'];
    $item_id = $_POST['item_id'];
    $quantity = $_POST['quantity'];
    $order_type = $_POST['order_type'];

    // Prepare the SQL query to insert the order
    $sql = "INSERT INTO orders (reservation_id, staff_no, item_id, quantity, order_type) 
            VALUES (?, ?, ?, ?, ?)";

    // Prepare the statement
    if ($stmt = $conn->prepare($sql)) {
        // Bind the parameters to the query (s = string, i = integer)
        $stmt->bind_param("sssis", $reservation_id, $staff_no, $item_id, $quantity, $order_type);

        // Execute the query and check for success
        if ($stmt->execute()) {
            // Order successfully created
            echo "Order successfully created!";
            header('Location: admin_order_confirm.html'); // Redirect to confirmation page
            exit();
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
    // Redirect to the admin order page if the form wasn't submitted
    header('Location: admin_order.html');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Staff Dashboard - Asian Asian</title>
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

        form {
            margin-bottom: 20px;
        }

        input[type="text"] {
            padding: 8px;
            margin-right: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        button {
            padding: 8px 12px;
            background-color: #580808;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #af954c;
        }
    </style>
</head>
<body>

<nav>
    <a href="admin_dashboard.php">Dashboard</a>
    <a href="admin_order.html">Make Order</a>
    <a href="admin_reservation.php">Reservations</a>
    <a href="admin_payment.html">Payment</a>
    <a href="logout_admin.php">Logout</a>
</nav>

<header>
    <h1>Make Order</h1>
</header>

<div class="dashboard-container">
    <h2>Welcome!</h2>
    <p>You can make an order:</p>
    <body>

        <div class="form-container">
            <form action="order_confirm.html" method="get">      
                <!-- Reservation ID -->
                <label for="reservation_id">Reservation ID:</label>
                <input type="text" id="reservation_id" name="reservation_id" required>
        
                <!-- Staff Number -->
                <label for="staff_no">Staff ID:</label>
                <input type="text" id="staff_no" name="staff_no" required>
        
                <!-- Item ID -->
                <label for="item_id">Item ID:</label>
                <input type="text" id="item_id" name="item_id" required>
        
                <!-- Quantity -->
                <label for="quantity">Quantity:</label>
                <input type="number" id="quantity" name="quantity" min="1" required>
        
                <!-- Order Type -->
                <label for="order_type">Order Type:</label>
                <select id="order_type" name="order_type" required>
                    <option value="dine_in">Dine-In</option>
                    <option value="take_away">Take Away</option>
                    <option value="delivery">Delivery</option>
                </select>
        
                <!-- Submit Button -->
                <button type="submit">Create Order</button>
            </form>
        </div>
    
</div>

</body>
</html>
