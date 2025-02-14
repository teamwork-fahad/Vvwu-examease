<?php

    session_start();
    include('../connection.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    // Get form data
    $semester_num = $_POST['semesterNumber'];
    $cid=$_POST['course_id'];
    $fees = $_POST['fees'];
    $no_s=$_POST['numberOfSubjects'];
    $start_date = $_POST['startingDate'];
    $end_date = $_POST['endingDate'];

    // Insert data into database
    $sql = "INSERT INTO semesterdetails (`SemesterNumber`, `CourseID`, `Fees`, `NumberOfSubjects`, `StartingDate`, `EndingDate`) 
    VALUES 
    ($semester_num, $cid, $fees, $no_s, '$start_date', '$end_date')";
//echo $sql;
    if ($conn->query($sql) === TRUE) {
        //echo json_encode(['status' => 'success']);
        header("Location: view_sem_info.php?course_id=" . $cid."&status=success");
    } else {
        //echo json_encode(['status' => 'error', 'message' => $conn->error]);
    }

    // Close connection
    $conn->close();
}
?>