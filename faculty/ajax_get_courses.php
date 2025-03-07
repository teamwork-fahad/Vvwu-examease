<?php 
    require_once '../connection.php';
    $did=$_GET['department_id'];  
    $sql = "SELECT * FROM `courseinfo` 
    WHERE `id`=$did";
    
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        echo "<option value=''>Select Course</option>";
        while($row = $result->fetch_assoc()) {
            echo "<option value='".$row['CourseID']."'>".$row['CourseCode']."</option>";
        }
    }
    else
    {
        echo "<option value=''>No Course Found in DB</option>";
    }
?>