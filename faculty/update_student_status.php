<?php
// update_student_status.php
require_once '../connection.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $studentId = $_POST['student_id'];
    $field = $_POST['field'];
    $value = $_POST['value'];

   

    $sql = "UPDATE students_status SET $field =$value WHERE student_id =$studentId";
   
    if (mysqli_query($conn, $sql)) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false]);
    }

   
}
?>