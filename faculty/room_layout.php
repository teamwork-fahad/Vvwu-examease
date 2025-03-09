<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Room Layout</title>
    <style>
        .table-container {
            display: flex;
            justify-content: space-between;
        }
        .table-container .table {
            width: 48%;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $building = $_POST['building'];
            $floors = $_POST['floor'];
            $roomsPerFloor = $_POST['rooms_per_floor'];
            $totalBenches = 0;

            echo "<h2>Building: $building</h2>";
            echo "<h3>Class Room Layout</h3>";

            for ($i = 1; $i <= $floors; $i++) {
                $floorLabel = $i . 'th';
                if ($i == 1) {
                    $floorLabel = '1st';
                } elseif ($i == 2) {
                    $floorLabel = '2nd';
                } elseif ($i == 3) {
                    $floorLabel = '3rd';
                }

                echo "<h4>{$floorLabel} Floor</h4>";
                echo "<div class='table-container'>";
                
                // First table
                echo "<table class='table table-bordered'>";
                echo "<thead><tr><th>Room Number</th><th>Benches</th></tr></thead>";
                echo "<tbody>";

                for ($j = 1; $j <= $roomsPerFloor; $j++) {
                    $roomNumber = $i * 100 + $j;
                    $benches = $_POST["benches_$roomNumber"];
                    $totalBenches += $benches;
                    echo "<tr><td>Room $roomNumber</td><td>$benches benches</td></tr>";
                }

                echo "</tbody>";
                echo "</table>";

                // Second table
                echo "<table class='table table-bordered'>";
                echo "<thead><tr><th colspan='4'>Bench Layout</th></tr></thead>";
                echo "<tbody>";

                for ($j = 1; $j <= $roomsPerFloor; $j++) {
                    $roomNumber = $i * 100 + $j;
                    $benches = $_POST["benches_$roomNumber"];
                    $benchesPerRow = ceil($benches / 4);
                    for ($k = 1; $k <= 4; $k++) {
                        echo "<tr><td>Row $k</td><td colspan='3'>$benchesPerRow benches</td></tr>";
                    }
                }

                echo "</tbody>";
                echo "</table>";

                echo "</div>";
            }

            echo "<h3>Total Benches: $totalBenches</h3>";
        }
        ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
