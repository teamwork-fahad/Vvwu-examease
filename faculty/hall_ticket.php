<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Hall Ticket</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .ticket {
            border: 1px solid #000;
            padding: 20px;
            margin: 20px;
        }
        .ticket-header {
            text-align: center;
            margin-bottom: 20px;
        }
        .ticket-body {
            margin-bottom: 20px;
        }
        .ticket-footer {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="ticket">
            <div class="ticket-header">
                <h2>Student Hall Ticket</h2>
            </div>
            <div class="ticket-body">
                <?php
               require_once '../connection.php';

                // Get student_id from query string
                $student_id = isset($_GET['sid']) ? intval($_GET['sid']) : 0;

                // Fetch student details
                $sql = "SELECT `student_id`, `enrollment_number`, `student_name`, `email`, `phone_number`, `student_password`, `profile_photo_path` FROM `student` WHERE `student_id` = $student_id";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // Output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo '<div class="row">';
                        echo '<div class="col-md-6">';
                        echo '<p><strong>Name:</strong> ' . htmlspecialchars($row['student_name']) . '</p>';
                        echo '<p><strong>Roll Number:</strong> ' . htmlspecialchars($row['enrollment_number']) . '</p>';
                        echo '</div>';
                        echo '<div class="col-md-6">';
                        echo '<p><strong>Exam Date:</strong> 01-Jan-2024</p>';
                        echo '<p><strong>Exam Time:</strong> 10:00 AM</p>';
                        echo '</div>';
                        echo '</div>';
                        echo '<div class="row">';
                        echo '<div class="col-md-12">';
                        echo '<p><strong>Exam Center:</strong> VVWU</p>';
                        echo '</div>';
                        echo '</div>';
                    }
                } else {
                    echo '<p>No student found with the given ID.</p>';
                }

                // Close connection
                $conn->close();
                ?>
            </div>
            <div class="ticket-footer">
                <button class="btn btn-primary" onclick="window.print()">Print Hall Ticket</button>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>