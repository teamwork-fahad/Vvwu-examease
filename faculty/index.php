<?php
    session_start();
    $faculty_email=$_SESSION['email'];
    if (!isset($faculty_email)) {
        echo "<script>alert('Your session has expired or you have logged out. Please login again to access this page.');</script>";
        header('Refresh: 0; url=login.php');
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faculty Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background-color: #f4f4f9;
        }
        .dashboard-card {
            transition: transform 0.3s;
        }
        .dashboard-card:hover {
            transform: translateY(-5px);
        }
        .card i {
            font-size: 2rem;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container py-5">
        <h1 class="text-center mb-4">Faculty Dashboard</h1>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card text-center p-4 dashboard-card">
                    <i class="fas fa-users"></i>
                    <a href="manage_students.php" class="stretched-link text-decoration-none">Manage Students</a>
                </div>
            </div> 

            <div class="col-md-4">
                <div class="card text-center p-4 dashboard-card">
                    <i class="fas fa-book-reader"></i>
                    <a href="manage_hall_ticket.php" class="stretched-link text-decoration-none">Manage Hall Ticket</a>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card text-center p-4 dashboard-card">
                    <i class="fas fa-user"></i>
                    <a href="profile.php" class="stretched-link text-decoration-none">Profile</a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center p-4 dashboard-card">
                    <i class="fas fa-calendar-alt"></i>
                    <a href="https://drive.google.com/file/d/1wkB-ffNYU2xKfD8nmwbcrxl57bTz7q5F/view" target="_blank" class="stretched-link text-decoration-none">Exam Time Table</a>
                </div>
            </div>
             <div class="col-md-4">
                <div class="card text-center p-4 dashboard-card">
                    <i class="fas fa-chart-line"></i>
                    <a href="generate_seating_arrangement.php" class="stretched-link text-decoration-none">Seating Arrangement</a>
                </div>
            </div>
            <!-- <div class="col-md-4">
                <div class="card text-center p-4 dashboard-card">
                    <i class="fas fa-money-check-alt"></i>
                    <a href="#" class="stretched-link text-decoration-none">Students Fees Verify</a>
                </div>
            </div> -->
            <div class="col-md-4">
                <div class="card text-center p-4 dashboard-card">
                    <i class="fas fa-key"></i>
                    <a href="change_pwd.php" class="stretched-link text-decoration-none">Change Password</a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center p-4 dashboard-card">
                    <i class="fas fa-sign-out-alt"></i>
                    <a href="logout.php" class="stretched-link text-decoration-none">Logout</a>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
