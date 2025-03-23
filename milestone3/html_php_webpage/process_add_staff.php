<?php
// Start the session (optional, depending on your setup)
session_start();

// Include the database connection file
include('config.php');  // Ensure this file contains your DB connection settings

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the form data (make sure to sanitize/validate inputs as needed)
    $staff_name = $_POST['staff_name'];
    $staff_shift = $_POST['staff_shift'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $staff_username = $_POST['staff_username'];
    $password = $_POST['password'];

    // Prepare the SQL query to insert the Staff
    $sql = "INSERT INTO STAFF (staff_name, staff_shift, email, phone_number, staff_username, password) 
            VALUES (?, ?, ?, ?, ?, ?)";

    // Prepare the statement
    if ($stmt = $conn->prepare($sql)) {
        // Bind the parameters to the query (s = string, i = integer)
        $stmt->bind_param("ssssss", $staff_name, $staff_shift, $email, $phone_number, $staff_username, $password);

        // Execute the query and check for success
        if ($stmt->execute()) {
            // Add staff successfully
            echo "Add staff successfully!";
            header('Location: add_staff_success.html');
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
    header('Location: process_add_staff.php');
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

        form {
            margin-bottom: 20px;
        }

        label, select, input {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"], input[type="number"], input[type="email"], input[type="password"], select {
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
            const addStaffForm = document.getElementById('add_staff_form');
            const updateStaffForm = document.getElementById('update_staff_form');

            if (formType === 'add') {
                addStaffForm.classList.remove('hidden');
                updateStaffForm.classList.add('hidden');
            } else if (formType === 'update') {
                addStaffForm.classList.add('hidden');
                updateStaffForm.classList.remove('hidden');
            } else {
                addStaffForm.classList.add('hidden');
                updateStaffForm.classList.add('hidden');
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
    <a href="admin_payment.html">Payment</a>
    <a href="logout_admin.php">Logout</a>
</nav>

<header>
    <h1>Manage Staff Information</h1>
</header>

<div class="dashboard-container">
    <label for="form_type">Choose Action:</label>
    <select id="form_type" onchange="toggleForm()">
        <option value="">-- Select an Option --</option>
        <option value="add">Add New Staff</option>
        <option value="update">Update Staff Information</option>
    </select>

    <!-- Add New Staff Form -->
    <form id="add_staff_form" class="hidden" action="process_add_staff.php" method="POST">
        <h2>Add New Staff</h2>
        <label for="staff_name">Staff Name:</label>
        <input type="text" id="staff_name" name="staff_name" required>

        <label for="staff_shift">Staff Shift:</label>
        <input type="text" id="staff_shift" name="staff_shift" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="phone_number">Phone Number:</label>
        <input type="text" id="phone_number" name="phone_number" required>

        <label for="staff_username">Username:</label>
        <input type="text" id="staff_username" name="staff_username" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <button type="submit">Add Staff</button>
    </form>

    <!-- Update Staff Information Form -->
    <form id="update_staff_form" class="hidden" action="process_update_staff.php" method="POST">
        <h2>Update Staff Information</h2>
        <label for="staff_id">Staff ID:</label>
        <input type="text" id="staff_id" name="staff_id" required>

        <label for="staff_name">Staff Name (Leave blank to keep unchanged):</label>
        <input type="text" id="update_staff_name" name="staff_name">

        <label for="staff_shift">Staff Shift (Leave blank to keep unchanged):</label>
        <input type="text" id="update_staff_shift" name="staff_shift">

        <label for="email">Email (Leave blank to keep unchanged):</label>
        <input type="email" id="update_email" name="email">

        <label for="phone_number">Phone Number (Leave blank to keep unchanged):</label>
        <input type="text" id="update_phone_number" name="phone_number">

        <label for="staff_username">Username (Leave blank to keep unchanged):</label>
        <input type="text" id="update_staff_username" name="staff_username">

        <label for="password">Password (Leave blank to keep unchanged):</label>
        <input type="password" id="update_password" name="password">

        <button type="submit">Update Staff</button>
    </form>
</div>

</body>
</html>
