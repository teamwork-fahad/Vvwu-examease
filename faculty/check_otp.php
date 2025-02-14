<?php
session_start();
if (isset($_SESSION['otp'])) {
    echo $_SESSION['otp']; // Return OTP
} else {
    echo "error"; // If session expired
}
?>