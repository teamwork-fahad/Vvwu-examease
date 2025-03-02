<!doctype html>
<html lang="en">
<!-- [Head] start -->

<head>
    <title>Dashboard | Admin</title>
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
                <a href="../dashboard/index.html" class="b-brand text-primary">
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
                                <h5 class="m-b-10">Total available Students</h5>
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
                <!-- [ sample-page ] start -->
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>Register Students</h5>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-hover table-striped">
                                <thead class="table-dark">
                                    <tr>
                                        <th>Enrollment Number</th>
                                        <th>Student Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Department</th>                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    include_once('../connection.php'); // Include your database connection file

                                    $query = "SELECT `enrollment_number`, `student_name`, `email`, `phone_number`
                                     FROM `student`
                                     order by enrollment_number";
                    
                                    $result = mysqli_query($conn, $query);

                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo "<tr>";
                                            echo "<td>" . htmlspecialchars($row['enrollment_number']) . "</td>";
                                            echo "<td>" . htmlspecialchars($row['student_name']) . "</td>";
                                            echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                                            echo "<td>" . htmlspecialchars($row['phone_number']) . "</td>";
                                            echo "<td>IT</td>";
                                            echo "</tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='5'>No students found</td></tr>";
                                    }

                                    mysqli_close($conn);
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- [ sample-page ] end -->
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







</body>
<!-- [Body] end -->

</html>