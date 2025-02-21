<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Hall Ticket</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2 class="mb-4" id="toggle-heading">Manage Hall Ticket/<a href="index.php">Back To Dashboard</a></h2>
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th style="width: 20%;">Enrollment Number</th>
                    <th>Name of Student</th>
                    <th style="width: 10%;">Continue Assessment</th>
                    <th style="width: 10%;">Attendance</th>
                    <th style="width: 10%;">Fees</th>
                    <th style="width: 10%;">Internal Exam</th>
                    <th>Hall Ticket</th>
                </tr>
            </thead>
            <tbody id="student-table-body">
                <?php
                $json = file_get_contents('http://localhost/Vvwu%20examease/faculty/api_students_status.php');
                $students = json_decode($json, true);

                foreach ($students as $student) {
                    echo "<tr data-student-id='{$student['student_id']}'>";
                    echo "<td>{$student['enrollment_number']}</td>";
                    echo "<td>{$student['student_name']}</td>";
                    echo "<td class='clickable'>" . ($student['continue_assessment'] == '1' ? '✔️' : ($student['continue_assessment'] === null ? '—' : '❌')) . "</td>";
                    echo "<td class='clickable'>" . ($student['attendance'] == '1' ? '✔️' : ($student['attendance'] === null ? '—' : '❌')) . "</td>";
                    echo "<td class='clickable'>" . ($student['fees'] == '1' ? '✔️' : ($student['fees'] === null ? '—' : '❌')) . "</td>";
                    echo "<td class='clickable'>" . ($student['internal_exam'] == '1' ? '✔️' : ($student['internal_exam'] === null ? '—' : '❌')) . "</td>";

                    if ($student['continue_assessment'] == '0' || $student['attendance'] == '0' || $student['fees'] == '0' || $student['internal_exam'] == '0') {
                        $message = "Not eligible due to ";
                        $reasons = [];
                        if ($student['continue_assessment'] == '0') $reasons[] = "Continue Assessment";
                        if ($student['attendance'] == '0') $reasons[] = "Attendance";
                        if ($student['fees'] == '0') $reasons[] = "Fees";
                        if ($student['internal_exam'] == '0') $reasons[] = "Internal Exam";
                        $message .= implode(", ", $reasons);
                        echo "<td><button class='btn btn-secondary' disabled>Not Eligible</button></td>";
                    } else {
                        echo "<td><a href='hall_ticket.php?sid={$student['student_id']}' class='btn btn-primary'>View Hall Ticket</a></td>";
                    }

                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="infoModal" tabindex="-1" aria-labelledby="infoModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="infoModalLabel">Information</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <ul>
                        <li>Click on the "Continue Assessment" heading to set all values to true.</li>
                        <li>Click on the "Attendance" heading to set all values to true.</li>
                        <li>Click on the "Fees" heading to set all values to true.</li>
                        <li>Click on the "Internal Exam" heading to set all values to true.</li>
                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function() {


            $('.clickable').on('click', function() {
                var $cell = $(this);
                var $row = $cell.closest('tr');
                var studentId = $row.data('student-id');
                var column = $cell.index();
                var field;

                switch (column) {
                    case 2:
                        field = 'continue_assessment';
                        break;
                    case 3:
                        field = 'attendance';
                        break;
                    case 4:
                        field = 'fees';
                        break;
                    case 5:
                        field = 'internal_exam';
                        break;
                    default:
                        return;
                }

                var currentValue = $cell.text().trim();
                var newValue = (currentValue === '✔️') ? '❌' : '✔️';

                $.ajax({
                    url: 'update_student_status.php',
                    method: 'POST',
                    data: {
                        student_id: studentId,
                        field: field,
                        value: (newValue === '✔️') ? '1' : '0'
                    },
                    success: function(response) {

                        alert('Status updated successfully');
                        location.reload();

                    }
                });
            });

            $('th').on('click', function() {
                var column = $(this).index();
                var field;

                switch (column) {
                    case 2:
                        field = 'continue_assessment';
                        break;
                    case 3:
                        field = 'attendance';
                        break;
                    case 4:
                        field = 'fees';
                        break;
                    case 5:
                        field = 'internal_exam';
                        break;
                    default:
                        return;
                }

                $.ajax({
                    url: 'update_all_students_status.php',
                    method: 'POST',
                    data: {
                        field: field,
                        value: '1'
                    },
                    success: function(response) {
                        if (response.success) {
                            $('#student-table-body tr').each(function() {
                                $(this).find('td').eq(column).text('✔️');
                            });
                        } else {
                            alert('Failed to update status for all students');
                        }
                    }
                });
            });
        });
    </script>
</body>

</html>