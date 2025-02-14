<?php
    require_once '../connection.php';
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['btnLogin'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            // Add your login logic here
        } else {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $mobile = $_POST['mobile'];
            $password = $_POST['password'];
            $department = $_POST['department'];

            // Add your sign-up logic here
            $sql = "INSERT INTO `faculty` (`faculty_name`, `email`, `phone`, `did`, `pass`) VALUES (?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssis", $name, $email, $mobile, $department, $password);

            if ($stmt->execute()) {
                echo "New faculty member added successfully.";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

            $stmt->close();
            $conn->close();
        }
    }