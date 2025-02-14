<?php
session_start();
include('../connection.php');

// Get course ID from request
$d_id = isset($_GET['dept_id']) ? intval($_GET['dept_id']) : 0;
if ($d_id > 0) {
    // Prepare and execute query
    $stmt = $conn->prepare("SELECT * FROM courseinfo WHERE id = ?");
    $stmt->bind_param("i", $d_id);
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows > 0) {
        echo "1";
    } else {
        echo "0";
    }
}
?>