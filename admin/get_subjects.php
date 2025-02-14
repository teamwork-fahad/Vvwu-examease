<?php
session_start();
include('../connection.php');
?>
<!doctype html>
<html lang="en">
<!-- [Head] start -->

<head>
    <title>Subjects | Admin</title>
    <!-- [Meta] -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description"
        content="Berry is trending dashboard template made using Bootstrap 5 design framework. Berry is available in Bootstrap, React, CodeIgniter, Angular,  and .net Technologies." />
    <meta name="keywords"
        content="Bootstrap admin template, Dashboard UI Kit, Dashboard Template, Backend Panel, react dashboard, angular dashboard" />
    <meta name="author" content="codedthemes" />

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
                                <h5 class="m-b-10">Subject</h5>
                            </div>
                        </div>
                        <div class="col-auto">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addSubjectModal">
                                Add New Subject
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="addSubjectModal" tabindex="-1" aria-labelledby="addSubjectModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="addSubjectModalLabel">Add New Subject</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="add_subject.php" method="POST">
                                                <input type="hidden" name="semester_id" value="<?php echo $_GET['semester_id']; ?>">
                                                <div class="mb-3">
                                                    <label for="subjectCode" class="form-label">Subject Code</label>
                                                    <input type="text" class="form-control" id="subjectCode" name="subject_code" placeholder="subject code" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="subjectName" class="form-label">Subject Full Name</label>
                                                    <input type="text" class="form-control" id="subjectName" name="subject_name" placeholder="Database Management System" required>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="subjectSName" class="form-label">Subject Short Name</label>
                                                            <input type="text" class="form-control" id="subjectSName" name="subject_sname" placeholder="DBMS" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="subjectCredit" class="form-label">Credit</label>
                                                            <input type="number" class="form-control" id="subjectCredit" name="credit" value="4" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="internalMarks" class="form-label">Internal Marks</label>
                                                            <input type="number" class="form-control" id="internalMarks" name="internal_marks" value="0" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="internalPassingMarks" class="form-label">Internal Passing Marks</label>
                                                            <input type="number" class="form-control" id="internalPassingMarks" name="internal_passing_marks" value="0" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="externalMarks" class="form-label">External Marks</label>
                                                            <input type="number" class="form-control" id="externalMarks" name="external_marks" value="0" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="externalPassingMarks" class="form-label">External Passing Marks</label>
                                                            <input type="number" class="form-control" id="externalPassingMarks" name="external_passing_marks" value="0" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Add Subject</button>
                                            </form>
                                        </div>
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
                <div class="container bootstrap snippet">
                    <div class="row">
                        <?php
                        if (isset($_GET['semester_id'])) {
                            $sem_id = $_GET['semester_id'];
                            $query = "SELECT * FROM subject WHERE sem_id = ?";
                            $stmt = $conn->prepare($query);
                            $stmt->bind_param("i", $sem_id);
                            $stmt->execute();
                            $result = $stmt->get_result();
                            if ($result->num_rows > 0) {

                                echo "<table class='table table-striped table-hover'>
                                        <thead class='thead-dark'>
                                        <tr>
                                            <th scope='col'>ID</th>
                                            <th scope='col'>Name</th>
                                            <th scope='col'>Credit</th>
                                            <th scope='col'>Internal Marks</th>
                                            <th scope='col'>External Marks</th>
                                            <th scope='col'>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>";
                                while ($row = $result->fetch_assoc()) {
                                    $sub_id = $row['subject_id'];
                                    echo "<tr>
                                        <td>" . $row['subject_code'] . "</td>
                                        <td>" . $row['subject_name'] . "</td>
                                        <td>" . $row['credit'] . "</td>
                                        <td>" . $row['internal_marks'] . "/" . $row['passing_internal_marks'] . "</td>
                                        <td>" . $row['external_marks'] . "/" . $row['passing_external_marks'] . "</td>
                                        <td><button data-sub-id='$sub_id' class='btn btn-success open-modal' data-bs-toggle='modal' data-bs-target='#myModal'><i class='fa fa-plus'></i> Allocate/Manage Faculty</button></td>
                                        </tr>";
                                }
                                echo "</tbody>
                                    </table>";
                            } else {
                                echo "<div class='alert alert-warning' role='alert'>No subject found.</div>";
                            }
                            $stmt->close();
                        }
                        ?>
                    </div>
                </div>
            </div>
            <!-- The Modal -->
            <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="allocateFacultyModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h5 class="modal-title" id="allocateFacultyModalLabel">Allocate/Manage Faculty</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <!-- Modal body -->
                        <div class="modal-body">
                            <form action="allocate_faculty.php" method="POST">
                                <input type="hidden" name="subject_id" id="subjectId" value="">
                                <div class="mb-3">
                                    <label for="facultySelect" class="form-label">Select Faculty</label>
                                    <select class="form-select" id="facultySelect" name="faculty_id" required>
                                        <option value="">Choose...</option>
                                        <?php
                                        $faculty_query = "SELECT * FROM faculty";
                                        $faculty_result = $conn->query($faculty_query);
                                        while ($faculty_row = $faculty_result->fetch_assoc()) {
                                            echo "<option value='" . $faculty_row['faculty_id'] . "'>" . $faculty_row['faculty_name'] . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary">Allocate Faculty</button>
                            </form>
                        </div>
                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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
    <!-- jQuery CDN -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <script>
        $(document).on('click', '.open-modal', function() {
            var id = $(this).data('sub-id'); // Get ID from button
            //alert(id);
            $('#subjectId').val(id); // Set ID in hidden input
            //$('#displayId').text(id); // Display ID in modal body for testing
        });
    </script>






</body>
<!-- [Body] end -->

</html>