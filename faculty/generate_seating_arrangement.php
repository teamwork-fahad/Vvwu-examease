<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ATKT Examination Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { padding: 20px; }
    </style>
</head>
<body>
    <br/>
<a class="btn btn-primary" href="set_classroom_layout.php">Set Class Room Layout</a>
    <div class="container border p-4">
        <h3 class="text-center">ATKT Examination Form</h3>
        <form action="seating_arrangement.php" method="POST">
            <div class="mb-3">
                <label class="form-label">School</label>
                <input type="text" class="form-control" name="school" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Department</label>
                <input type="text" class="form-control" name="department" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Programme</label>
                <input type="text" class="form-control" name="programme" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Building</label>
                <input type="text" class="form-control" name="building" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Date</label>
                <input type="date" class="form-control" name="date" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Semester</label>
                <input type="number" class="form-control" name="semester" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Room No</label>
                <input type="text" class="form-control" name="room_no" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Block No</label>
                <input type="text" class="form-control" name="block_no" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Total No of Students</label>
                <input type="text" class="form-control" name="total_students" required>
            </div>
           
            <div class="mb-3">
                <label class="form-label">Exam Superintendent</label>
                <input type="text" class="form-control" name="superintendent" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>
