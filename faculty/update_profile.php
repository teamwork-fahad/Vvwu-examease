<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    

<?php
include '../connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $faculty_name = $_POST['faculty_name'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $profile_photo = $_FILES['profile_photo']['name'];
    $target_dir = "profile_pic/";
    $target_file = $target_dir . basename($profile_photo);

    // Check if file was uploaded without errors
    if (isset($_FILES['profile_photo']) && $_FILES['profile_photo']['error'] == 0) {
        move_uploaded_file($_FILES['profile_photo']['tmp_name'], $target_file);
    } else {
        $target_file = 'no_photo.png'; // No new file uploaded, set to default image
    }

    // Update query
    $sql = "UPDATE faculty SET faculty_name=?, phone=?, profile_photo=? WHERE email=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $faculty_name, $phone_number, $target_file, $email);

    if ($stmt->execute()) {
        echo "<script>
                Swal.fire({
                    title: 'Success!',
                    text: 'Profile updated successfully.',
                    icon: 'success',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = 'profile.php';
                    }
                });
              </script>";
    } else {
        echo "<script>
            Swal.fire({
                title: 'Error!',
                text: 'Error updating profile: " . $conn->error . "',
                icon: 'error',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.isConfirmed) {
                window.location.href = 'profile.php';
                }
            });
              </script>";
    }

    $stmt->close();
    $conn->close();
}
?>
</body>
</html>