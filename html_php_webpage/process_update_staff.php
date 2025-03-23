<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = ""; // Adjust based on your setup
$dbname = "asianrestaurant"; // Replace with your database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get data from POST request
$staff_id = $_POST['staff_id'];
$staff_name = $_POST['staff_name'] ?? null;
$staff_shift = $_POST['staff_shift'] ?? null;
$email = $_POST['email'] ?? null;
$phone_number = $_POST['phone_number'] ?? null;
$staff_username = $_POST['staff_username'] ?? null;
$password = $_POST['password'] ? password_hash($_POST['password'], PASSWORD_BCRYPT) : null;

// Build update query
$update_fields = [];
if ($staff_name) $update_fields[] = "staff_name='$staff_name'";
if ($staff_shift) $update_fields[] = "staff_shift='$staff_shift'";
if ($email) $update_fields[] = "email='$email'";
if ($phone_number) $update_fields[] = "phone_number='$phone_number'";
if ($staff_username) $update_fields[] = "staff_username='$staff_username'";
if ($password) $update_fields[] = "password='$password'";

if (!empty($update_fields)) {
    $update_query = "UPDATE staff SET " . implode(", ", $update_fields) . " WHERE staff_id='$staff_id'";

    if ($conn->query($update_query) === TRUE) {
        echo "Staff information updated successfully!";
    } else {
        echo "Error updating record: " . $conn->error;
    }
} else {
    echo "No fields to update!";
}

$conn->close();
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
    <a href="admin_menu.html">Menu</a>
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
