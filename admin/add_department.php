<?php
    session_start();
    include('../connection.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dept_name = $_POST["dept_name"];
    $dept_code = $_POST["dept_code"];

    $stmt = $conn->prepare("INSERT INTO departments (department_name, department_code) VALUES (?, ?)");
    $stmt->bind_param("ss", $dept_name, $dept_code);
    
    if ($stmt->execute()) {
        echo "Success";
    } else {
        echo "Error: " . $conn->error;
    }
    $stmt->close();
}
?>