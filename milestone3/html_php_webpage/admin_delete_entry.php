<?php
// Include the database connection
include('config.php');

// Check if the form was submitted
if (isset($_POST['order_id'])) {
    $order_id = $_POST['order_id'];

    // Delete from orders table
    $sql = "DELETE FROM orders WHERE order_id = ?";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("i", $order_id);
        if ($stmt->execute()) {
            header('Location: admin_dashboard.php');
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Error preparing the query: " . $conn->error;
    }
} elseif (isset($_POST['reservation_id'])) {
    $reservation_id = $_POST['reservation_id'];

    // Delete from reservation table
    $sql = "DELETE FROM reservation WHERE reservation_id = ?";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("i", $reservation_id);
        if ($stmt->execute()) {
            header('Location: admin_dashboard.php');
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Error preparing the query: " . $conn->error;
    }
} elseif (isset($_POST['payment_id'])) {
    $payment_id = $_POST['payment_id'];

    // Delete from payment table
    $sql = "DELETE FROM payment WHERE payment_id = ?";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("i", $payment_id);
        if ($stmt->execute()) {
            header('Location: admin_dashboard.php');
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Error preparing the query: " . $conn->error;
    }
} elseif (isset($_POST['staff_id'])) {
    $staff_id = $_POST['staff_id'];

    // Delete from staff table
    $sql = "DELETE FROM staff WHERE staff_id = ?";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("i", $staff_id);
        if ($stmt->execute()) {
            header('Location: admin_dashboard.php');
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Error preparing the query: " . $conn->error;
    }
} elseif (isset($_POST['item_id'])) {
    $item_id = $_POST['item_id'];

    // Delete from menu table
    $sql = "DELETE FROM menu WHERE item_id = ?";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("i", $item_id);
        if ($stmt->execute()) {
            header('Location: admin_dashboard.php');
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Error preparing the query: " . $conn->error;
    }
} else {
    // If neither order_id, reservation_id, payment_id, staff_id nor item_id is set, redirect to the dashboard
    header('Location: admin_dashboard.php');
    exit();
}

// Close the connection
$conn->close();
?>
