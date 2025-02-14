<?php
    session_start();
    include('../connection.php');
// Check if department ID is set
if (isset($_GET['id'])) {
    $department_id = intval($_GET['id']);

    // Prepare and bind
    $stmt = $conn->prepare("DELETE FROM departments WHERE id = ?");
    $stmt->bind_param("i", $department_id);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Department deleted successfully.";
    } else {
        echo "Error deleting department: " . $stmt->error;
    }

    // Close statement
    $stmt->close();
} else {
    echo "No department ID provided.";
}

// Close connection
$conn->close();
?>