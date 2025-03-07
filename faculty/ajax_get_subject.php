<?php 
    require_once '../connection.php';
    $sem_id=$_GET['sem_id'];  
    $sql = "SELECT * FROM `subject` 
    WHERE `sem_id`=$sem_id";
    
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc())
        {
        ?>
        <tr>
            <td><input type="text" readonly class="form-control" name="subject_code[]" value="<?php echo $row['subject_code'];?>"></td>
            <td><input type="text" class="form-control" name="subject_name[]" value="<?php echo $row['subject_name'];?>" readonly></td>
            <td>
                <input type="date" class="form-control" name="exam_date[]" required onchange="updateDay(this)">
                <p></p>
            </td>
            <td><input type="time" class="form-control" name="exam_start_time[]" required></td>
            <td><input type="time" class="form-control" name="exam_end_time[]" required></td>
        </tr>
        <?php
        }
        
    }
    else
    {
        echo "<td colspan='5'>No Subject Found in Database</td>";
    }
?>
<script>
function updateDay(dateInput) {
    var dateValue = new Date(dateInput.value);
    var days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
    var dayName = days[dateValue.getUTCDay()];
    dateInput.nextElementSibling.textContent = dayName;
    
}
</script>