<?php
require_once '../connection.php';

// Get student_id from query string
$student_id = isset($_GET['sid']) ? intval($_GET['sid']) : 0;

// Fetch student details
$sql = "SELECT `student_id`, `enrollment_number`, `student_name`, `email`, `phone_number`, `student_password`, `profile_photo_path` FROM `student` WHERE `student_id` = $student_id";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hall Ticket</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 20px;
            border: 1px solid #000;
        }

        .header {
            text-align: center;
        }

        .header img {
            width: 100px;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
        }

        .table,
        .table th,
        .table td {
            border: 1px solid black;
        }

        .table th,
        .table td {
            padding: 10px;
            text-align: left;
        }

        .notes {
            font-size: 14px;
            margin-top: 20px;
        }
    </style>
</head>

<body>

    <div class="header">
        <h2>VANITA VISHRAM WOMEN'S UNIVERSITY</h2>
        <p>Managed By: Vanita Vishram, Surat</p>
        <p>(1st Women's University of Gujarat)</p>
        <p>Approved by Government of Gujarat under the Provisions of the Gujarat Private Universities Act, 2009</p>

    </div>

    <h3 style="text-align:center;">HALL TICKET</h3>

    <?php
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo '<p><strong>School:</strong> School of Science and Technology</p>';
        echo '<p><strong>Program:</strong> B.C.A (Hons.)</p>';
        echo '<p><strong>Semester:</strong> V</p>';
        echo '<p><strong>Examination:</strong> Semester V Regular November 2024</p>';
        echo '<p><strong>Student\'s Name:</strong> ' . htmlspecialchars($row['student_name']) . '</p>';
        echo '<p><strong>Seat No:</strong> ' . htmlspecialchars($row['enrollment_number']) . '</p>';
    } else {
        echo '<p>No student found with the given ID.</p>';
    }
    ?>

    <table class="table">
        <tr>
            <th>Subject Code</th>
            <th>Subject Name</th>
            <th>Date</th>
            <th>Main Answer Sheet No.</th>
            <th>Signature of Invigilator</th>
            <th>Practical Date & Sign</th>
        </tr>
        <tr>
            <td>CS11200</td>
            <td>Software Engineering</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>CS11210</td>
            <td>Computer Graphics</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>CS11220</td>
            <td>Web Development using PHP</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>CS11230</td>
            <td>Web Development using PHP (Th)</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>CS14010</td>
            <td>Web Development using Asp.NET (Th)</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>CS14020</td>
            <td>Mobile Application using Android</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>CS14050</td>
            <td>Mobile Application using Android (Th)</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    </table>

    <p><strong>Student's Signature:</strong> _____________________</p>

    <div class="notes">
        <h3>Note:</h3>
        <p>(1) This is a computer-generated copy. Hence, an authorized signature is not required.</p>
        <p>(2) No candidate/examinee shall use unfair means or indulge in misconduct of any kind.</p>

        <h3>Unfair Means shall include the following:</h3>
        <ol>
            <li>During examination time having in possession or access to:
                <ul>
                    <li>Any paper, book, note, or any other material (relevant or irrelevant).</li>
                    <li>Mobile Phones or any electronic gadget other than a non-programmable calculator.</li>
                    <li>Any writing on the body or clothing that may have relevance to the syllabus.</li>
                    <li>Anything written on the question paper that may have relevance to the syllabus.</li>
                </ul>
            </li>
            <li>Giving or receiving assistance during the examination.</li>
            <li>Talking to another candidate or unauthorized person inside or outside the examination hall.</li>
            <li>Destroying or attempting to destroy any note or paper.</li>
            <li>Impersonation by any candidate or getting impersonated.</li>
            <li>Possessing or reading any incriminating material.</li>
        </ol>
    </div>

</body>

</html>