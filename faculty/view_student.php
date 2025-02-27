<?php
include '../connection.php'; // Make sure this file contains your database connection code

// Get student ID from query string
$student_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($student_id > 0) {
    // Prepare and execute the query
    $stmt = $conn->prepare("SELECT `student_id`, `enrollment_number`, `student_name`, `email`, `phone_number`, `student_password`, `profile_photo_path` FROM `student` WHERE `student_id` = ?");
    $stmt->bind_param("i", $student_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $student = $result->fetch_assoc();
    } else {
        echo "No student found with the given ID.";
        exit;
    }
} else {
    echo "Invalid student ID.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Student</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .container {
            margin-top: 50px;
        }
        .profile-photo {
            max-width: 150px;
            max-height: 150px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="text-center">Student Details</h2>
        <div class="card">
            <div class="card-body">
                <div class="text-center">
                    <img src="../student/<?php echo htmlspecialchars($student['profile_photo_path']); ?>" alt="Profile Photo" class="profile-photo img-thumbnail">
                </div>
                <table class="table table-bordered mt-3">
                    <tr>
                        <th>Student ID</th>
                        <td><?php echo htmlspecialchars($student['student_id']); ?></td>
                    </tr>
                    <tr>
                        <th>Enrollment Number</th>
                        <td><?php echo htmlspecialchars($student['enrollment_number']); ?></td>
                    </tr>
                    <tr>
                        <th>Student Name</th>
                        <td><?php echo htmlspecialchars($student['student_name']); ?></td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td><?php echo htmlspecialchars($student['email']); ?></td>
                    </tr>
                    <tr>
                        <th>Phone Number</th>
                        <td><?php echo htmlspecialchars($student['phone_number']); ?></td>
                    </tr>
                    
                </table>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>