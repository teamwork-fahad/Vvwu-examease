<?php
header('Content-Type: application/json');

// Include the database connection file
require_once '../connection.php';

// Initialize the response array
$response = array();

// Count the number of students
$studentQuery = "SELECT COUNT(*) as student_count FROM student";
$studentResult = mysqli_query($conn, $studentQuery);
if ($studentResult) {
    $studentData = mysqli_fetch_assoc($studentResult);
    $response['student_count'] = $studentData['student_count'];
} else {
    $response['student_count'] = 0;
}

// Count the number of faculty
$facultyQuery = "SELECT COUNT(*) as faculty_count FROM faculty";
$facultyResult = mysqli_query($conn, $facultyQuery);
if ($facultyResult) {
    $facultyData = mysqli_fetch_assoc($facultyResult);
    $response['faculty_count'] = $facultyData['faculty_count'];
} else {
    $response['faculty_count'] = 0;
}

// Output the response in JSON format
echo json_encode($response);

// Close the database connection
mysqli_close($conn);
?>