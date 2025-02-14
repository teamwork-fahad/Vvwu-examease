<?php
session_start();

include('../connection.php');
$course_id = $_GET['course_id'];
$sql = "
SELECT * 
FROM `courseinfo` as c  
join departments as d 
on d.id=c.id
where c.CourseID='$course_id'
";
$course_result = $conn->query($sql);
$course_row = $course_result->fetch_assoc();
?>
<!doctype html>
<html lang="en">
<!-- [Head] start -->

<head>
    <title>Manage Semester | Admin</title>
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
                                <h5 class="m-b-10 text-center" style="font-weight: bold; color: #007bff;">Manage
                                    Semester Wise Subjects, Fees, Credit, Marks and Other Info</h5>
                                <div class="row">
                                    <hr />
                                    <div class="col-md-6">
                                        <h6 style="font-weight: bold;">Course Name:</h6>
                                        <p><u><?php echo $course_row['CourseName']; ?></u></p>
                                    </div>
                                    <div class="col-md-6">
                                        <h6 style="font-weight: bold;">Department Name:</h6>
                                        <p><u><?php echo $course_row['department_name']; ?></u></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <h6 style="font-weight: bold;">Course Code:</h6>
                                        <p><u><?php echo $course_row['CourseCode']; ?></u></p>
                                    </div>
                                    <div class="col-md-6">
                                        <h6 style="font-weight: bold;">Number of Years:</h6>
                                        <p><u><?php echo $course_row['NumberOfYears']; ?></u></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- [ breadcrumb ] end -->
            <!-- [ Main Content ] start -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="card-title">Semester Information</h5>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#addSemesterModal">
                                Add New Semester Info
                            </button>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="addSemesterModal" tabindex="-1"
                            aria-labelledby="addSemesterModalLabel">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="addSemesterModalLabel">Add Semester Information</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="add_semester_info.php" method="POST">
                                            <input type="hidden" name="course_id" value="<?php echo $course_id; ?>" />
                                            <div class="mb-3">
                                                <label for="semesterNumber" class="form-label">Semester Number</label>
                                                <input type="text" class="form-control" id="semesterNumber"
                                                    name="semesterNumber" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="fees" class="form-label">Fees</label>
                                                <input type="number" class="form-control" id="fees" name="fees"
                                                    required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="numberOfSubjects" class="form-label">Number of
                                                    Subjects</label>
                                                <input type="number" class="form-control" id="numberOfSubjects"
                                                    name="numberOfSubjects" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="startingDate" class="form-label">Starting Date</label>
                                                <input type="date" class="form-control" id="startingDate"
                                                    name="startingDate" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="endingDate" class="form-label">Ending Date</label>
                                                <input type="date" class="form-control" id="endingDate"
                                                    name="endingDate" required>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Semester Number</th>
                                            <th>Fees</th>
                                            <th>Number of Subjects</th>
                                            <th>Starting Date</th>
                                            <th>Ending Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $semester_sql = "
                                        SELECT sem_id,SemesterNumber, CourseID, Fees, NumberOfSubjects, StartingDate, EndingDate 
                                        FROM semesterdetails 
                                        WHERE CourseID='$course_id'
                                        order by SemesterNumber";
                                        $semester_result = $conn->query($semester_sql);

                                        if ($semester_result->num_rows > 0) {

                                            while ($semester_row = $semester_result->fetch_assoc()) {
                                                $sem_id = $semester_row['sem_id'];
                                                echo '<tr>';
                                                echo "<td>" . $semester_row['SemesterNumber'] . "</td>";
                                                echo "<td><i class='fa fa-inr'></i>" . $semester_row['Fees'] . "</td>";
                                                echo "<td>" . $semester_row['NumberOfSubjects'] . "</td>";

                                                echo "<td>" . $semester_row['StartingDate'] . "</td>";
                                                echo "<td>" . $semester_row['EndingDate'] . "</td>";
                                               echo "<td><a href='get_subjects.php?semester_id=$sem_id' class='btn btn-success'>View Subjects</a></td>";
                                                echo "</tr>";
                                            }
                                        } else {
                                            echo "<tr><td colspan='5'>No semester information found</td></tr>";
                                        }
                                        ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
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
    <?php
    if (isset($_GET['status']) && $_GET['status'] == 'success') {
        echo "<script>
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: 'Semester information added successfully',
        });
        </script>";
    }
    ?>
   
</body>
<!-- [Body] end -->

</html>