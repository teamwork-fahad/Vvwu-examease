<?php
    session_start();
    $s_email=$_SESSION['student_email'];
    if (!isset($s_email)) {
        header('location: login.php');
    }
    include '../connection.php';
    $sql = "SELECT `student_id`, `enrollment_number`, `student_name`, `email`, `phone_number`, `student_password`, `profile_photo_path` 
    FROM `student`
    WHERE email='$s_email'";
    //echo $sql;
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $s_name = $row['student_name'];
        $email = $row['email'];
        $phone = $row['phone_number'];
        $profile_photo = $row['profile_photo_path'];
        
    } else {
        echo "No records found";
    }

    $conn->close();
?>
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faculty Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background-color: #f4f4f9;
        }
        .profile-card {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .profile-icon {
            font-size: 100px;
            color: #4CAF50;
        }
        .back-to-dashboard {
            display: flex;
            align-items: center;
            text-decoration: none;
            color: #4CAF50;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .back-to-dashboard i {
            margin-right: 8px;
        }
    </style>
</head>
<body>
    <div class="container py-5">
        <a href="dashboard.php" class="back-to-dashboard">
            <i class="fas fa-arrow-left"></i> Back to Dashboard</a>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="profile-card text-center">
                    <?php if ($profile_photo == 'no_photo.png'): ?>
                        <i class="fas fa-user-circle profile-icon"></i>
                    <?php else: ?>
                        <img src="<?php echo $profile_photo; ?>" alt="Profile Photo" class="img-fluid rounded-circle" style="width: 150px; height: 150px;">
                    <?php endif; ?>
                    <h2 class="my-3"><?php echo $s_name; ?></h2>
                    <p><strong>Department:</strong> <?php echo "IT";?></p>
                    <p><strong>Email:</strong> <?php echo $email;?></p>
                    <p><strong>Phone:</strong> <?php echo $phone;?></p>
                    <a href="edit_profile.php" class="btn btn-success mt-3">Edit Profile</a>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
