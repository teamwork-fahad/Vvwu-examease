<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>


    <?php
    session_start();
    include('../connection.php');

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Query the database
        $query = "SELECT * FROM student WHERE email='$email' AND student_password='$password'";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) == 1) {
            // Login successful
            $_SESSION['student_email'] = $email;
            echo "<script>
                Swal.fire({
                    title: 'Success!',
                    text: 'Login successful!',
                    icon: 'success',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = 'dashboard.php';
                    }
                });
              </script>";
        } 
        else {
            // Login failed
            echo "<script>
                Swal.fire({
                    title: 'Error!',
                    text: 'Invalid email or password',
                    icon: 'error',
                    confirmButtonText: 'OK'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = 'login.php';
                    }
                });
              </script>";
        }
    }
    ?>
</body>

</html>