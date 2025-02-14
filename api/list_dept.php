<?php
    header('Content-Type: application/json');
    require_once '../connection.php';

    $query = "SELECT * FROM departments ORDER BY department_name";
    $result = $conn->query($query);

    $departments = array();
    while ($row = $result->fetch_assoc()) {
        $departments[] = $row;
    }

    echo json_encode($departments);
?>
