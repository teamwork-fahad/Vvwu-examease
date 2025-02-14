<?php
    session_start();
    include('../connection.php');
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $semester_id = $_POST['semester_id'];
        $subject_code = $_POST['subject_code'];
        $subject_name = $_POST['subject_name'];
        $subject_sname = $_POST['subject_sname'];
        $credit = $_POST['credit'];
        $internal_marks = $_POST['internal_marks'];
        $internal_passing_marks = $_POST['internal_passing_marks'];
        $external_marks = $_POST['external_marks'];
        $external_passing_marks = $_POST['external_passing_marks'];

        $sql = "INSERT INTO `subject`
        (`subject_code`, `subject_name`, `short_name`, `credit`, `internal_marks`, `passing_internal_marks`, `external_marks`, `passing_external_marks`, `sem_id`) 
        VALUES 
        ('$subject_code','$subject_name','$subject_sname','$credit','$internal_marks','$internal_passing_marks','$external_marks','$external_passing_marks','$semester_id')";

        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('New subject added successfully');</script>";
            echo "<script>window.location.href='get_subjects.php?semester_id=$semester_id';</script>";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

        mysqli_close($conn);
    }
?>