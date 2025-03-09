<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ATKT Examination Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { padding: 20px; }
        .highlight { background-color: yellow; }
        .table-bordered th, .table-bordered td { text-align: center; }
    </style>
</head>
<body>
    
    <div class="container border p-4">
        <h3 class="text-center">ATKT Examination | February 2025</h3>
        <p class="text-center">Time: 11.30 am to 2.00 pm</p>

        <div class="row">
            <div class="col-md-6">
                <p><strong>School:</strong> <?php echo $_POST['school']; ?></p>
                <p><strong>Department:</strong> <?php echo $_POST['department']; ?></p>
                <p><strong>Programme:</strong> <?php echo $_POST['programme']; ?></p>
                <p><strong>Building:</strong> <span class="highlight"><?php echo $_POST['building']; ?></span></p>
            </div>
            <div class="col-md-6 text-end">
                <p><strong>Date:</strong> <span class="highlight"><?php echo $_POST['date']; ?></span></p>
                <p><strong>Semester:</strong> <?php echo $_POST['semester']; ?></p>
                <p><strong>Room No:</strong> <?php echo $_POST['room_no']; ?></p>
                <p><strong>Block No:</strong> <?php echo $_POST['block_no']; ?></p>
            </div>
        </div>

        <h5 class="mt-4">Total No of Students</h5>
        <p><?php echo $_POST['total_students']; ?></p>

        <h5 class="mt-4">Seating Arrangement</h5>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Bench No</th>
                    <th>Row 1</th>
                    <th>Row 2</th>
                    <th>Row 3</th>
                    <th>Row 4</th>
                </tr>
            </thead>
            <tbody>
                <?php
                for ($i = 1; $i <= 5; $i++) {
                    echo "<tr>";
                    echo "<td>" . $i . "</td>";
                    for ($j = 1; $j <= 4; $j++) {
                        echo "<td>" . "2025" . rand(1, 5) . "," . "20253" . rand(1, 5) . "</td>";
                    }
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
        
        <p class="mt-4"><strong>Exam Superintendent:</strong> <?php echo $_POST['superintendent']; ?></p>
    </div>
</body>
</html>
