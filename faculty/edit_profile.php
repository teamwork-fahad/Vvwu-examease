<?php
    session_start();
    $faculty_email = $_SESSION['email'];
    if (!isset($faculty_email)) {
        header('location: login.php');
    }
    include '../connection.php';
    $sql = "SELECT department_name, `faculty_id`, `faculty_name`, `email`, `phone`, `did`, `pass`, `profile_photo`, `status`
            FROM `faculty` f 
            JOIN departments d
            ON f.did = d.id
            WHERE email = '$faculty_email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $faculty_name = $row['faculty_name'];
        $email = $row['email'];
        $phone = $row['phone'];
        $profile_photo = $row['profile_photo'];
    } else {
        // Handle case where no faculty member is found
        $faculty_name = '';
        $email = '';
        $phone = '';
        $profile_photo = '';
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center">
                        <h4>Edit Profile</h4>
                    </div>
                    <div class="card-body">
                        <form action="update_profile.php" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="facultyName">Faculty Name</label>
                                <input type="text" class="form-control" id="facultyName" name="faculty_name" value="<?php echo $faculty_name; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>" readonly required>
                                <small class="form-text text-muted">You can't change your email ID.</small>
                            </div>
                            <div class="form-group">
                                <label for="phoneNumber">Phone Number</label>
                                <input type="text" class="form-control" id="phoneNumber" name="phone_number" value="<?php echo $phone; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="profilePhoto">Profile Photo</label>
                                <input type="file" class="form-control-file" id="profilePhoto" name="profile_photo">
                               
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Update Profile</button>
                        </form>
                            
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>