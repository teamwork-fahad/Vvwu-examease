<?php
    $sub_id=$_POST['subject_id'];
    $faculty_id=$_POST['faculty_id'];
    include('../connection.php');
    $sql = "INSERT INTO `subjectwisefacultyallocate`
    (`faculty_id`, `subject_id`) 
    VALUES ('$faculty_id','$sub_id')";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Success'); window.location.href='sub_wise_fac.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
?>