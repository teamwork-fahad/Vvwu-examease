<?php
    session_start();
    include('../connection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Include SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
/* Fontawesome */
@import url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css');

body {
    font-family: 'Arial', sans-serif;
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

.container {
    display: flex;
    height: 100vh;
    align-items: stretch;
}

.left-section {
    background: url('https://img.freepik.com/premium-vector/man-freelancer-sits-table-cafe-working-laptop-remote-worker-drinking-beverage-coworking-space-workplace-cafeteria-restaurant_575670-1291.jpg?size=626&ext=jpg&ga=GA1.1.1546980028.1702771200&semt=ais') no-repeat center center;
    display: none;
}

.right-section {
    flex-grow: 1;
    display: flex;
    align-items: center;
    justify-content: center;
}

.login-container {
    background-color: rgba(255, 255, 255, 0.8);
    padding: 40px;
    border-radius: 15px;
    box-shadow: 0 10px 25px rgb(10 75 90);
    width: 100%;
    max-width: 450px;
}

.login-form h2 {
    color: #ffb144;
    text-align: center;
    margin-bottom: 35px;
}

.login-title i {
    margin-right: 10px;
    color: #027186;
}

.form-control {
    position: relative;
    margin-bottom: 30px;
}

.form-control i {
    position: absolute;
    left: 15px;
    top: 14px;
    color: #32495e;
}

.form-control input {
    width: 100%;
    max-width: 95%;
    padding: 12px 0 12px 37px;
    border: 2px solid #00569f1c;
    background-color: rgb(232, 232, 232);
    color: rgb(50, 73, 94);
    border-radius: 6px;
    transition: all 0.3s ease-in-out 0s;
}

.form-control input:focus {
    outline: none;
    border: 2px solid #ffd8a1;
}

.form-control input:invalid:not(:focus):not(:placeholder-shown) {
    border: 2px solid #ff3860;
}

.remember-me {
    display: flex;
    align-items: center;
    margin-bottom: 20px;
}

.remember-me .checkbox-custom {
    width: 20px;
    height: 20px;
    margin-right: 10px;
    display: inline-block;
    vertical-align: middle;
    position: relative;
    border: 2px solid #027186;
    border-radius: 3px;
    cursor: pointer;
    background-color: #f7f7f7;
    transition: background-color 0.3s, border-color 0.3s;
    background-color: #f7f7f7;
    transition: background-color 0.3s, border-color 0.3s;
    pointer-events: none;
}

.remember-me .checkbox-custom::after {
    content: '';
    position: absolute;
    left: 5px;
    top: 1px;
    width: 6px;
    height: 11px;
    border: solid #027186;
    border-width: 0 3px 3px 0;
    transform: rotate(45deg);
    border: solid white;
    border-width: 0 2px 2px 0;
    display: none;
}

.remember-me label {
    color: #333;
    font-size: 0.95em;
    cursor: pointer;
}

.remember-me input[type="checkbox"] {
    display: none;
}

.remember-me input[type="checkbox"]:checked+.checkbox-custom::after {
    display: block;
}

.remember-me input[type="checkbox"]:checked+.checkbox-custom {
    background-color: #027186;
    border-color: #027186;
}

.social-login {
    display: flex;
    justify-content: space-around;
    margin-bottom: 20px;
}

.social-icon {
    display: inline-block;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    line-height: 40px;
    text-align: center;
    transition: background-color 0.3s ease;
    cursor: pointer;
}

.fab.fa-google {
    background-color: #DB4437;
    color: white;
}

.fab.fa-facebook-f {
    background-color: #4267B2;
    color: white;
}

.fab.fa-twitter {
    background-color: #1DA1F2;
    color: white;
}

.fab.fa-google:hover {
    background-color: #e57373;
}

.fab.fa-facebook-f:hover {
    background-color: #5c7cfa;
}

.fab.fa-twitter:hover {
    background-color: #69c0ff;
}

button {
    width: 100%;
    padding: 15px;
    border: none;
    border-radius: 12px;
    background-color: #ffaa33;
    color: white;
    font-size: 17px;
    cursor: pointer;
    transition: background-color 0.3s;
    display: flex;
    justify-content: center;
    align-items: center;
}

button:hover {
    background-color: #405d7d;
}

/*Responsive*/
@media screen and (min-width: 768px) {
    .left-section {
        display: block;
        /* Show the left section on larger screens */
        flex: 1;
    }
}
    </style>
</head>
<body>
    <?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
   
    // Check the database
    $stmt = "SELECT * FROM admin WHERE username = '$username'";
    $res=mysqli_query($conn,$stmt);
    $record=mysqli_num_rows($res);
    if($record==1)
    {
        $row = mysqli_fetch_assoc($res); // Fetch the data as an associative array
        if($row['admin_password']==$password)
        {
        echo "
        <script>
            Swal.fire({
                title: 'Success!',
                text: 'Admin login successful.',
                icon: 'success',
                confirmButtonText: 'OK'
            }).then(() => {
                    window.location.href = 'dashboard.php'; // Redirect
                });
        </script>
        ";
        }
        else
        {
            echo "
            <script>
            Swal.fire({
                title: 'Password is wrong...',
                text: 'Email is correct but password is wrong',
                icon: 'question'
            }).then(() => {
                    window.location.href = 'login.php'; // Redirect
                });
            </script>
            ";
        }
    }
    else
    {
        echo "
        <script>
                Swal.fire({
                    title: 'Login Failed!',
                    text: 'Incorrect password.',
                    icon: 'error',
                    confirmButtonText: 'Try Again'
                }).then(() => {
                    window.location.href = 'login.php'; // Redirect to login page
                });
            </script>
            ";
    }        
}
    ?>
<div class="container">
        <div class="left-section"></div>
        <div class="right-section">
            <div class="login-container">
                <form class="login-form" method="post">
                    <h2 class="login-title"><i class="fas fa-user-circle"></i>Admin Login</h2>
                    <div class="form-control">
                        <i class="fas fa-user icon"></i>
                        <input type="text" placeholder="Username" id="username" name="username"  required>
                    </div>
                    <div class="form-control">
                        <i class="fas fa-lock icon"></i>
                        <input type="password" placeholder="Password" name="password" id="password" >
                    </div>
                    <div class="remember-me">
                        <input type="checkbox" id="rememberMe" class="checkbox-input">
                        <span class="checkbox-custom"></span>
                        <label for="rememberMe">Remember me</label>
                    </div>
                    <button type="submit">Login</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>