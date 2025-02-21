<?php
    require_once '../connection.php';
    header('Content-Type: application/json');

    $query = "
        SELECT 
            s.student_id, 
            s.enrollment_number, 
            s.student_name, 
            ss.continue_assessment, 
            ss.attendance, 
            ss.fees, 
            ss.internal_exam 
        FROM student s
        left JOIN students_status ss ON s.student_id = ss.student_id
    ";

    $result = $conn->query($query);

    $students = array();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $students[] = $row;
        }
    }

    echo json_encode($students);
?>