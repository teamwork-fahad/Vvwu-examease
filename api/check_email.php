<?php
// Database connection
require_once '../connection.php';

// Check if email is set
if (isset($_GET['email'])) {
    $email = $_GET['email'];
    $email = $conn->real_escape_string($email);

    // Query to check if email exists
    $sql = "SELECT * FROM faculty WHERE email = '$email'";
    $result = $conn->query($sql);

    // Prepare response
    $response = array();
    if ($result->num_rows > 0) {
        $response['exists'] = true;
    } else {
        $response['exists'] = false;
    }

    // Send response as JSON
    header('Content-Type: application/json');
    echo json_encode($response);
}

// Close connection
$conn->close();
?>