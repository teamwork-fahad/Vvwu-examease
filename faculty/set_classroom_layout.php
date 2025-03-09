<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">

        <div class="border p-4 rounded shadow">
            <h2 class="text-center">Class Room Layout Form</h2>
            <!-- Form content goes here -->
            <form action="room_layout.php" method="POST">
                <div class="form-group">
                    <label for="building">Building Name</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-building"></i></span>
                        </div>
                        <input type="text" class="form-control" id="building" name="building" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="floor">Number of Floors</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-layer-group"></i></span>
                        </div>
                        <input type="number" class="form-control" id="floor" name="floor" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="rooms_per_floor">Rooms per Floor</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-door-open"></i></span>
                        </div>
                        <input type="number" class="form-control" id="rooms_per_floor" name="rooms_per_floor" required>
                    </div>
                </div>
                <div id="rooms_container"></div>
                <script>
                    document.getElementById('floor').addEventListener('input', generateRooms);
                    document.getElementById('rooms_per_floor').addEventListener('input', generateRooms);

                    function generateRooms() {
                        const floors = document.getElementById('floor').value;
                        const roomsPerFloor = document.getElementById('rooms_per_floor').value;
                        const roomsContainer = document.getElementById('rooms_container');
                        roomsContainer.innerHTML = '';

                        for (let i = 1; i <= floors; i++) {
                            const floorHeader = document.createElement('h4');
                            floorHeader.textContent = `${i}st Floor`;
                            roomsContainer.appendChild(floorHeader);

                            const row = document.createElement('div');
                            row.className = 'row';

                            for (let j = 1; j <= roomsPerFloor; j++) {
                                const roomNumber = i * 100 + j;
                                const col = document.createElement('div');
                                col.className = 'col-md-4';
                                col.innerHTML = `
                                    <div class="form-group">
                                        <label for="benches_${roomNumber}">Number of Benches in Room ${roomNumber}</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-chair"></i></span>
                                            </div>
                                            <input type="number" value="30" class="form-control" id="benches_${roomNumber}" name="benches_${roomNumber}" required>
                                        </div>
                                    </div>
                                `;
                                row.appendChild(col);
                            }
                            roomsContainer.appendChild(row);
                        }
                    }
                    
                </script>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>