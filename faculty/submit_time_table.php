<?php
// Assuming the data is coming from a POST request
$data = $_POST;

// Extracting data from the array
$department_name = $data['department_name'];
$course_name = $data['course_name'];
$exam_title = $data['exam_title'];
$department = $data['department'];
$course = $data['course'];
$semester = $data['semester'];
$subject_codes = $data['subject_code'];
$subject_names = $data['subject_name'];
$exam_dates = $data['exam_date'];
$exam_start_times = $data['exam_start_time'];
$exam_end_times = $data['exam_end_time'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exam Time Table</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            padding: 20px;
        }
        h1, h2, h3, h4 {
            text-align: center;
        }
        table {
            margin: 0 auto;
            width: 80%;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1><?php echo $exam_title; ?></h1>
        <h2>Department: <?php echo $department_name; ?></h2>
        <h3>Course: <?php echo $course_name; ?></h3>
        <h4>Semester: <?php echo $semester; ?></h4>

        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Subject Code</th>
                    <th>Subject Name</th>
                    <th>Exam Date</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                </tr>
            </thead>
            <tbody>
                <?php for ($i = 0; $i < count($subject_codes); $i++): ?>
                    <tr>
                        <td><?php echo $subject_codes[$i]; ?></td>
                        <td><?php echo $subject_names[$i]; ?></td>
                        <td><?php echo $exam_dates[$i]; ?></td>
                        <td><?php echo $exam_start_times[$i]; ?></td>
                        <td><?php echo $exam_end_times[$i]; ?></td>
                    </tr>
                <?php endfor; ?>
            </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>