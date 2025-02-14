<?php
session_start();
include('../connection.php');
$sql = "SELECT id,department_name, department_code FROM departments";
$dept_result = $conn->query($sql);
?>
<!doctype html>
<html lang="en">
<!-- [Head] start -->

<head>
    <title>Department | Admin</title>
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
    <style>
        .card {
            border: none;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
            height: 250px;
            /* Fixed height */
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .card-body {
            text-align: center;
            padding: 20px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            height: 100%;
        }

        .card-title {
            font-size: 1.3rem;
            font-weight: bold;
            color: #333;
        }

        .card-text {
            color: #666;
        }

        /* Button Group */
        .btn-group {
            width: 100%;
        }

        .btn-group .btn {
            flex: 1;
            padding: 8px 0;
            font-size: 14px;
            font-weight: bold;
            transition: background 0.3s ease-in-out, transform 0.2s ease-in-out;
        }

        /* Hover Effects */
        .btn-group .btn:hover {
            transform: scale(1.05);
        }

        /* Button Colors */
        .btn-primary {
            background-color: #007bff;
            border: none;
        }

        .btn-warning {
            background-color: #ffc107;
            border: none;
            color: black;
        }

        .btn-danger {
            background-color: #dc3545;
            border: none;
        }
    </style>
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
                                <h5 class="m-b-10">Manage Departments</h5>
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
                <div class="col-md-4">
                    <div class="card add-card" onclick="showAddDepartmentModal()">
                        <div class="card-body d-flex flex-column justify-content-center align-items-center">
                            <h5 class="card-title text-center">Add New Department</h5>
                            <a href="add_department.php" class="add-btn">+</a>
                        </div>
                    </div>
                </div>

                <?php
                if ($dept_result->num_rows > 0) {
                    while ($row = $dept_result->fetch_assoc()) {
                ?>
                        <div class="col-md-4">
                            <div class="card mb-4 shadow-sm">
                                <div class="card-body text-center d-flex flex-column justify-content-between">
                                    <div>
                                        <?php
                                        $did = $row["id"];
                                        $dname = $row["department_name"];
                                        $dcode = $row["department_code"];
                                        ?>
                                        <h5 class="card-title"><?php echo htmlspecialchars($row["department_name"]); ?></h5>
                                        <p class="card-text"><strong>Code:</strong>
                                            <?php echo htmlspecialchars($row["department_code"]); ?></p>
                                    </div>
                                    <!-- Button Group at Bottom -->
                                    <div class="btn-group mt-3" role="group">
                                        <a href="view_course.php?id=<?php echo urlencode($row['id']); ?>"
                                            class="btn btn-primary btn-sm">
                                            <i class="fas fa-eye"></i> View Course
                                        </a>
                                    </div>
                                    <div class="btn-group mt-2" role="group">
                                        <button class="btn btn-warning btn-sm"
                                            onclick="updateDepartment(<?php echo $did; ?>, '<?php echo $dname; ?>', '<?php echo $dcode; ?>')">
                                            <i class="fas fa-edit"></i> Update
                                        </button>
                                        <button class="btn btn-danger btn-sm" onclick="deleteDepartment(<?php echo $did; ?>)">
                                            <i class="fas fa-trash"></i> Delete
                                        </button>
                                    </div>

                                </div>
                            </div>
                        </div>

                <?php
                    }
                } else {
                    echo "<p class='text-center'>No departments found.</p>";
                }
                ?>

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
    <script>
        function showAddDepartmentModal() {
            Swal.fire({
                title: "Add New Department",
                html: `
            <input type="text" id="dept_name" class="swal2-input" placeholder="Department Name">
            <input type="text" id="dept_code" class="swal2-input" placeholder="Department Code">
        `,
                confirmButtonText: "Save",
                showCancelButton: true,
                preConfirm: () => {
                    const deptName = document.getElementById("dept_name").value.trim();
                    const deptCode = document.getElementById("dept_code").value.trim();

                    if (!deptName || !deptCode) {
                        Swal.showValidationMessage("Please fill out all fields");
                        return false;
                    }

                    return {
                        deptName,
                        deptCode
                    };
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    saveDepartment(result.value.deptName, result.value.deptCode);
                }
            });
        }

        function saveDepartment(name, code) {
            fetch("add_department.php", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/x-www-form-urlencoded"
                    },
                    body: `dept_name=${encodeURIComponent(name)}&dept_code=${encodeURIComponent(code)}`
                })
                .then(response => response.text())
                .then(data => {
                    Swal.fire("Success!", "Department added successfully!", "success").then(() => {
                        location.reload(); // Reload to show new department
                    });
                })
                .catch(error => {
                    Swal.fire("Error!", "Failed to add department!", "error");
                });
        }

        // Update Department (Open SweetAlert Modal)
        function updateDepartment(did, dname, deptCode) {
            Swal.fire({
                title: "Update Department",
                html: `
             <input type="hidden" id="dept_id" value="${did}">
            <input type="text" id="new_dept_name" class="swal2-input" placeholder="New Department Name" value="${dname}">
            <input type="text" id="new_dept_code" class="swal2-input" placeholder="New Department Code" value="${deptCode}" >
        `,
                confirmButtonText: "Update",
                showCancelButton: true,
                preConfirm: () => {
                    const newDeptName = document.getElementById("new_dept_name").value.trim();
                    const newDeptCode = document.getElementById("new_dept_code").value.trim();

                    if (!newDeptName) {
                        Swal.showValidationMessage("Please enter a department name");
                        return false;
                    }

                }
            }).then((result) => {
                if (result.isConfirmed) {
                    const deptId = document.getElementById("dept_id").value;
                    const newDeptName = document.getElementById("new_dept_name").value;
                    const newDeptCode = document.getElementById("new_dept_code").value;

                    updateDepartmentAjax(deptId, newDeptName, newDeptCode);
                }

            });
        }

        function updateDepartmentAjax(deptId, newDeptName, newDeptCode) {
            $.ajax({
                url: "update_department.php",
                type: "POST",
                data: {
                    dept_id: deptId,
                    dept_name: newDeptName,
                    dept_code: newDeptCode
                },
                success: function(response) {
                    Swal.fire("Success!", "Department updated successfully!", "success").then(() => {
                        location.reload(); // Reload to show updated department
                    });
                },
                error: function() {
                    Swal.fire("Error!", "Failed to update department!", "error");
                }
            });

        }
        // Delete Department (Confirmation & AJAX Request)
        function deleteDepartment(deptId) {
            console.log("Deleting department with ID:", deptId); // Log the department ID
            $.ajax({
                url: "check_course.php",
                type: "GET",
                data: {
                    dept_id: deptId
                },
                success: function(response) {
                    console.log(response);
                    if (response==1) {
                        Swal.fire("Error!",
                            "You can't delete this department because associated course is found!", "error");
                    } else {
                        Swal.fire({
                            title: "Are you sure?",
                            text: "This department will be deleted permanently!",
                            icon: "warning",
                            showCancelButton: true,
                            confirmButtonColor: "#d33",
                            cancelButtonColor: "#3085d6",
                            confirmButtonText: "Yes, delete it!"
                        }).then((result) => {
                            if (result.isConfirmed) {
                                $.ajax({
                                    url: "delete_department.php",
                                    type: "GET",
                                    data: {
                                        id: deptId
                                    },
                                    success: function(response) {
                                        Swal.fire("Success!",
                                            "Department deleted successfully!",
                                            "success").then(() => {
                                            location
                                                .reload(); // Reload to show updated department
                                        });
                                    },
                                    error: function() {
                                        Swal.fire("Error!", "Failed to delete department!",
                                            "error");
                                    }
                                });
                            }
                        });
                    } 
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error("AJAX Error: ", textStatus, errorThrown); // Log the error details
                    Swal.fire("Error!", "Failed to check associated courses!", "error");
                    Swal.fire("Error!", "Failed to check associated courses!", "error");
                }
            
            });

        }
    </script>

</body>
<!-- [Body] end -->

</html>