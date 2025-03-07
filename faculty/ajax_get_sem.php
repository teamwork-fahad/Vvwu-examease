<?php 
    require_once '../connection.php';
    $cid=$_GET['course_id'];  
    $sql = "SELECT * FROM `semesterdetails` 
    WHERE `CourseID`=$cid";
    
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        echo "<option value=''>Select Semester</option>";
        while($row = $result->fetch_assoc()) {
            echo "<option value='".$row['sem_id']."'>".$row['SemesterNumber']."</option>";
        }
    }
    else
    {
        echo "<option value=''>No Sem Found in DB</option>";
    }
?>