<?php
// Start the session (optional, depending on your setup)
session_start();

// Include the database connection file
include('config.php');  // Ensure this file contains your DB connection settings

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the form data (make sure to sanitize/validate inputs as needed)
    $reservation_id = $_POST['reservation_id'];
    $amount_paid = $_POST['amount_paid'];
    $payment_method = $_POST['payment_method'];
    
    // Prepare the SQL query to insert the order
    $sql = "INSERT INTO payment (reservation_id, amount_paid, payment_method) 
            VALUES (?, ?, ?)";

    // Prepare the statement
    if ($stmt = $conn->prepare($sql)) {
        // Bind the parameters to the query (s = string, i = integer)
        $stmt->bind_param("sss", $reservation_id, $amount_paid, $payment_method);

        // Execute the query and check for success
        if ($stmt->execute()) {
            // Order successfully created
            echo "Payment successfully made!";
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
    // Redirect to the admin payment page if the form wasn't submitted
    header('Location: admin_payment.html');
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
    <a href="admin_reservation.html">Reservations</a>
    <a href="change_staff.html">Staff</a>
    <a href="admin_menu.html">Menu</a>
    <a href="admin_payment.html">Payment</a>
    <a href="logout_admin.php">Logout</a>
</nav>

<header>
    <h1>Make Payment</h1>
</header>

<div class="dashboard-container">
    <h2>Welcome!</h2>
    <p>You can make a payment:</p>
    <body>

        <div class="form-container">
            <form action="admin_payment.php" method="POST">      
                <!-- Reservation ID -->
                <label for="reservation_id">Reservation ID:</label>
                <input type="text" id="reservation_id" name="reservation_id" required>
        
                <!-- Amount Paid -->
                <label for="amount_paid">Amount Paid:</label>
                <input type="number" id="amount_paid" name="amount_paid" min="0" step="0.01" required>
        
                <!-- Payment Method -->
                <label for="payment_method">Payment Method:</label>
                <input type="text" id="payment_method" name="payment_method" required>
        
                <!-- Submit Button -->
                <button type="submit">Submit Payment</button>
            </form>
        </div>      
</div>

</body>
</html>
