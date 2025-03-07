<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Exam Time Table</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .card {
            margin-top: 50px;
            max-width: 800px;
            /* Adjust the width as needed */
            margin-left: auto;
            margin-right: auto;
        }

        .card-header {
            background-color: #007bff;
            color: white;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2 class="mb-0">Add New Time Table</h2>
            </div>
            <div class="card-body">
                <form action="submit_time_table.php" method="post">
                    <input type="hidden" name="department_name" id="department_name">
                    <input type="hidden" name="course_name" id="course_name">
                    <div class="form-group">
                        <label for="exam_title">Exam Title</label>
                        <input type="text" placeholder="End Semester Exam March-2025" class="form-control" id="exam_title" name="exam_title" required>
                    </div>
                    <div class="form-group">
                        <label for="department">Department</label>
                        <select class="form-control" id="department" name="department" required>
                            <option value="">Select Department</option>
                        </select>
                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                fetch('../api/list_dept.php')
                                    .then(response => response.json())
                                    .then(data => {
                                        const departmentSelect = document.getElementById('department');
                                        data.forEach(department => {
                                            const option = document.createElement('option');
                                            option.value = department.id;
                                            option.textContent = department.department_name;
                                            departmentSelect.appendChild(option);
                                        });
                                    })
                                    .catch(error => console.error('Error fetching department data:', error));
                            });
                        </script>
                    </div>
                    <div class="form-group">
                        <label for="course">Course</label>
                        <select class="form-control" id="course" name="course" required>
                            <option value="">Select Course</option>
                        </select></div>
                    <div class="form-group">
                        <label for="semester">Semester</label>
                        <select class="form-control" id="semester" name="semester" required>
                            <option value="">Select Semester</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th width="5%">Subject Code</th>
                                    <th width="50%">Subject Name</th>
                                    <th>Exam Date & Day</th>                                    
                                    <th width="5%">Start Time</th>
                                    <th width="5%">End Time</th>
                                </tr>
                            </thead>
                            <tbody id="examTableBody">
                                
                            </tbody>
                        </table>
                    </div>
                    <button type="submit" class="btn btn-primary">Generate Time Table</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $('#department').on('change', function() {
            const departmentId = $(this).val();
            
            $.ajax({
                url: `ajax_get_courses.php`,
                type: 'GET',
                data: {
                    department_id: departmentId
                },
                success: function(data) {
                    $('#course').html(data);
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching course data:', error);
                }
            });
        });

        $('#course').on('change', function() {
            var dept_name=$('#department option:selected').text();
            $('#department_name').val(dept_name);
            //alert(dept_name);
            const courseId = $(this).val();
           // alert(courseId);
            $.ajax({
                url: `ajax_get_sem.php`,
                type: 'GET',
                data: {
                    course_id: courseId
                },
                success: function(data) {
                    $('#semester').html(data);
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching semester data:', error);
                }
            });
        });

        $('#semester').on('change', function() {
            const semId = $(this).val();
            var course_name=$('#course option:selected').text();
            $('#course_name').val(course_name);
            //alert(course_name);
            $.ajax({
                url: `ajax_get_subject.php`,
                type: 'GET',
                data: {
                    sem_id: semId
                },
                success: function(data) {
                    $('#examTableBody').html(data);
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching subject data:', error);
                }
            });
        });
    </script>
</body>

</html>