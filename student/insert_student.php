<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    
</body>
</html>
<?php
require_once '../connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $enrollment_number = $_POST['enrollment_number'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $mobile_number = $_POST['mobile_number'];
    $profile_photo_path = 'images/no.png';

    $sql = "INSERT INTO student (enrollment_number, student_name, email, phone_number, student_password, profile_photo_path) 
            VALUES (?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssss", $enrollment_number, $name, $email, $mobile_number, $password, $profile_photo_path);

    if ($stmt->execute()) {
        $student_id = $conn->insert_id;
        $status_sql = "INSERT INTO students_status (student_id, continue_assessment, attendance, fees, internal_exam) 
                       VALUES (?, 0, 0, 0, 0)";
        $status_stmt = $conn->prepare($status_sql);
        $status_stmt->bind_param("i", $student_id);
        if ($status_stmt->execute()) {
            echo "<script>
                Swal.fire({
                title: 'Success!',
                text: 'Congratulations student, your account is created. Now login.',
                icon: 'success',
                confirmButtonText: 'OK'
                }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'login.php';
                }
                });
              </script>";
        } else {
            echo "Error: " . $status_sql . "<br>" . $conn->error;
        }
        $status_stmt->close();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>