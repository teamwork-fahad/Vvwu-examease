<?php
    session_start();
    $faculty_email=$_SESSION['email'];
    if (!isset($faculty_email)) {
        header('location: login.php');
    }
    include '../connection.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
   <style>
        .container {
            margin-top: 50px;
        }
        .card {
            padding: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <h3 class="card-title text-center">Change Password</h3>
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="currentPassword">Current Password</label>
                            <input type="password" class="form-control" id="currentPassword" name="currentPassword" required>
                        </div>
                        <div class="form-group">
                            <label for="newPassword">New Password</label>
                            <input type="password" class="form-control" id="newPassword" name="newPassword" required>
                        </div>
                        <div class="form-group">
                            <label for="confirmPassword">Confirm New Password</label>
                            <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" required>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Change Password</button>
                    </form>
                    <?php
                        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                            $currentPassword = $_POST['currentPassword'];
                            $newPassword = $_POST['newPassword'];
                            $confirmPassword = $_POST['confirmPassword'];

                            $query = "SELECT pass FROM faculty WHERE email='$faculty_email'";
                            $result = mysqli_query($conn, $query);
                            $row = mysqli_fetch_assoc($result);

                            if ($currentPassword==$row['pass']) {
                                if ($newPassword == $confirmPassword) {
                                    $updateQuery = "UPDATE faculty SET pass='$newPassword' WHERE email='$faculty_email'";
                                    if (mysqli_query($conn, $updateQuery)) {
                                            echo "<script>
                                                Swal.fire({
                                                    icon: 'success',
                                                    title: 'Password Changed',
                                                    text: 'Password changed successfully. Please login again.',
                                                    showConfirmButton: false,
                                                    timer: 2000
                                                }).then(function() {
                                                    window.location = 'logout.php';
                                                });
                                            </script>";
                                    } else {
                                        echo "<div class='alert alert-danger mt-3'>Error updating password.</div>";
                                    }
                                } else {
                                    echo "<div class='alert alert-danger mt-3'>New passwords do not match.</div>";
                                }
                            } else {
                                echo "<div class='alert alert-danger mt-3'>Current password is incorrect.</div>";
                            }
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>