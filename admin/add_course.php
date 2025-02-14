<?php
    session_start();
    include('../connection.php');
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $courseName = $_POST['courseName'];
    $courseCode = $_POST['courseCode'];
    $numberOfYears = $_POST['numberOfYears'];
    $id=$_POST['department_id'];
   
    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO courseinfo (courseName, courseCode, numberOfYears,id) VALUES (?, ?, ?,?)");
    $stmt->bind_param("ssii", $courseName, $courseCode, $numberOfYears, $id);

    // Execute the statement
    if ($stmt->execute()) {
        echo "New course added successfully";
        header("Location: view_course.php?id=" . $id);
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close connections
    $stmt->close();
    $conn->close();
}
?>