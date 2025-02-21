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
    <title>Manage Students</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Manage Students/<a href="index.php">Back To Dashboard</a></h2>
        <div class="btn-group mb-3" role="group" aria-label="View Options">
            <button type="button" class="btn btn-primary" id="tableViewBtn">Table View</button>
            <button type="button" class="btn btn-secondary" id="gridViewBtn">Grid View</button>
        </div>
        <div id="studentsContainer">
            <!-- Table View -->
            <div id="tableView" class="d-none">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Enrollment Number</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = "SELECT * FROM student order by enrollment_number";
                        $result = mysqli_query($conn, $query);
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . $row['enrollment_number'] . "</td>";
                            echo "<td><img src='../student/" . $row['profile_photo_path'] . "' alt='Student Image' class='img-thumbnail' style='width: 100px; height: 100px;'></td>";
                            echo "<td>" . $row['student_name'] . "</td>";
                            echo "<td>" . $row['email'] . "</td>";
                            echo "<td><a href='view_student.php?id=" . $row['student_id'] . "' class='btn btn-warning'>View Details</a></td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <!-- Grid View -->
            <div id="gridView" class="d-none">
                <div class="row">
                    <?php
                    $result = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<div class='col-md-3 mb-4'>";
                        echo "<div class='card'>";
                        $imagePath = $row['profile_photo_path'] ? '../student/' . $row['profile_photo_path'] : '../student/no.png';
                        echo "<img style='width:240px;height:240px' src='" . $imagePath . "' class='card-img-top' alt='Student Image'>";
                        echo "<div class='card-body'>";
                        echo "<h5 class='card-title'>" . $row['student_name'] . "</h5>";
                        echo "<p class='card-text'>" . $row['email'] . "</p>";
                        echo "<a href='view_student.php?id=" . $row['student_id'] . "' class='btn btn-warning'>View Details</a>";
                        echo "</div>";
                        echo "</div>";
                        echo "</div>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#tableViewBtn').click(function() {
                $('#tableView').removeClass('d-none');
                $('#gridView').addClass('d-none');
            });
            $('#gridViewBtn').click(function() {
                $('#gridView').removeClass('d-none');
                $('#tableView').addClass('d-none');
            });
        });
    </script>
</body>
</html>
    