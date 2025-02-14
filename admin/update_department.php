<?php
    session_start();
    include('../connection.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    echo $dept_id = $_POST['dept_id'];
    echo $dept_name = $_POST['dept_name'];
    echo $dept_code=$_POST['dept_code'];
    $sql="update departments set department_name='$dept_name',department_code='$dept_code' where id='$dept_id'";
    if ($conn->query($sql) === TRUE) 
    {
        echo "Record updated successfully";
    } 
    else 
    {
        echo "Error updating record: " . $conn->error;
    }
   
}
?>