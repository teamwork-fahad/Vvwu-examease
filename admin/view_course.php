<?php
    session_start();
    include('../connection.php');
    $id=$_GET['id'];
    $sql = "SELECT department_name FROM departments where id = $id";
    $dept_result = $conn->query($sql);
    $dept_row = $dept_result->fetch_assoc();
    $dept_name = $dept_row['department_name'];
?>
<!doctype html>
<html lang="en">
<!-- [Head] start -->

<head>
    <title>Course | Admin</title>
    <!-- [Meta] -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description"
        content="Berry is trending dashboard template made using Bootstrap 5 design framework. Berry is available in Bootstrap, React, CodeIgniter, Angular,  and .net Technologies." />
    <meta name="keywords"
        content="Bootstrap admin template, Dashboard UI Kit, Dashboard Template, Backend Panel, react dashboard, angular dashboard" />
    <meta name="author" content="codedthemes" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <?php 
        include_once('up_link.php');
    ?>
</head>
<!-- [Head] end -->
<!-- [Body] Start -->

<body>
    <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>
    <!-- [ Pre-loader ] End -->
    <!-- [ Sidebar Menu ] start -->
    <nav class="pc-sidebar">
        <div class="navbar-wrapper">
            <div class="m-header">
                <a href="" class="b-brand text-primary">
                    <!-- ========   Change your logo from here   ============ -->
                    <img src="assets/images/logo-dark.svg" alt="" class="logo logo-lg" />
                </a>
            </div>
            <div class="navbar-content">
                <?php 
        include_once('navbar.php');
    ?>
            </div>
        </div>
    </nav>
    <!-- [ Sidebar Menu ] end -->
    <!-- [ Header Topbar ] start -->
    <header class="pc-header">
        <?php 
        include_once('header.php');
    ?>
    </header>
    <!-- [ Header ] end -->



    <!-- [ Main Content ] start -->
    <div class="pc-container">
        <div class="pc-content">
            <!-- [ breadcrumb ] start -->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col">
                            <div class="page-header-title">
                                <h5 class="m-b-10 text-primary">Courses available in <?php echo $dept_name;?>
                                    Departments</h5>
                            </div>
                        </div>
                        <div class="col-auto">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0)">Other</a></li>
                                <li class="breadcrumb-item" aria-current="page">Sample Page</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ breadcrumb ] end -->
            <!-- [ Main Content ] start -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5>Courses</h5>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#addCourseModal">Add New Course</button>
                            </div>

                            <!-- Modal -->
                            <div class="modal fade" id="addCourseModal" tabindex="-1"
                                aria-labelledby="addCourseModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="addCourseModalLabel">Add New Course</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="add_course.php" method="post">
                                                <input type="hidden" name="department_id" value="<?php echo $id; ?>">
                                                <div class="mb-3">
                                                    <label for="courseName" class="form-label">Course Full Name</label>
                                                    <input type="text" class="form-control" id="courseName" placeholder="Bachelor Computer Science"
                                                        name="courseName" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="courseCode" class="form-label">Course Code</label>
                                                    <input type="text" class="form-control" id="courseCode" placeholder="BCA"
                                                        name="courseCode" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="numberOfYears" class="form-label">Number of
                                                        Years</label>
                                                    <input type="number" class="form-control" id="numberOfYears" placeholder="3"
                                                        name="numberOfYears" required>
                                                </div>
                                                <input type="submit" class="btn btn-primary" value="Insert Course" />
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <script>
                            $(document).ready(function() {
                                $('#addCourseForm').on('submit', function(e) {
                                    e.preventDefault();
                                    // Add your AJAX code here to submit the form data to the server
                                });
                            });
                            </script>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Course Name</th>
                                            <th>Course Code</th>
                                            <th>Number of Year</th>
                                            <th>Semester</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $sql = "SELECT * FROM courseinfo where id = $id";
                                            $result = $conn->query($sql);
                                            $i = 1;
                                            if ($result->num_rows > 0) {
                                                // output data of each row
                                                while($row = $result->fetch_assoc()) {
                                                    echo "<tr>";
                                                    echo "<td>".$i++."</td>";
                                                    echo "<td>".$row["CourseName"]."</td>";
                                                    echo "<td>".$row["CourseCode"]."</td>";
                                                    echo "<td>".$row["NumberOfYears"]."</td>";
                                                    echo "<td><a href='view_sem_info.php?course_id=".$row["CourseID"]."'><button class='btn btn-success'>View Sem & Subjects</button></a></td>";
                                                    echo "<td><a href='edit_course.php?id=".$row["CourseID"]."'>Edit</a> | <a href='delete_course.php?id=".$row["CourseID"]."'>Delete</a></td>";
                                                    echo "</tr>";
                                                }
                                            } else {
                                                echo "no course found";
                                            }
                                        ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Course Name</th>
                                            <th>Course Code</th>
                                            <th>Number of Year</th>
                                            <th>Semester</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                    </ </div>
                    <!-- [ Main Content ] end -->
                </div>
            </div>
            <!-- [ Main Content ] end -->
            <footer class="pc-footer">
                <?php 
        include_once('footer.php');
    ?>
            </footer>
            <!-- Required Js -->
            <?php 
        include_once('down_link.php');
    ?>
</body>
<!-- [Body] end -->

</html>