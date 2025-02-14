<?php
session_start();
$email=$_SESSION['email'];
$otp=$_SESSION['otp'];
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';

$mail = new PHPMailer(true);

try {
	$mail->SMTPDebug = 0;									 
	$mail->isSMTP();										 
	$mail->Host	 = 'smtp.gmail.com';				 
	$mail->SMTPAuth = true;							 
	$mail->Username = 'teamwork7861@gmail.com';				 
	$mail->Password = 'cwog bbsv nypk fvsg';					 
	$mail->SMTPSecure = 'tls';							 
	$mail->Port	 = 587; 

	$mail->setFrom('teamwork7861@gmail.com', 'Vanita Vishram Women University');		 
	$mail->addAddress($email);

        $mail->isHTML(true);
        $mail->Subject = 'Your OTP for Verification';

        // Email Body
        $mail->Body = "
            <div style='font-family: Arial, sans-serif; padding: 20px; text-align: center; background-color: #f4f4f4;'>
                <h2 style='color: #4CAF50;'>Your OTP Code</h2>
                <p>Use the following OTP to verify your email:</p>
                <h3 style='background: #4CAF50; color: white; padding: 10px; display: inline-block; border-radius: 5px;'>
                    $otp
                </h3>
                <p>This OTP is valid for only <b>10 minutes</b>. Do not share this with anyone.</p>
                <hr>
                <p style='color: #888;'>If you did not request this, please ignore this email.</p>
            </div>
        ";

        $mail->AltBody = "Your OTP for verification is $otp. This OTP is valid for 10 minutes.";
        $mail->send();
        } catch (Exception $e) {
	echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?><?php

if (!isset($_SESSION['otp'])) {
    die("Unauthorized Access"); // Prevent direct access
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify OTP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #667eea, #764ba2);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .otp-container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
            text-align: center;
        }
        .otp-input {
            width: 50px;
            height: 50px;
            font-size: 24px;
            text-align: center;
            margin: 5px;
            border: 2px solid #667eea;
            border-radius: 5px;
        }
        .otp-input:focus {
            outline: none;
            border-color: #764ba2;
            box-shadow: 0 0 5px rgba(118, 75, 162, 0.5);
        }
        .error-msg {
            color: red;
            margin-top: 10px;
        }
    </style>
</head>
<body>

<div class="otp-container">
    <h3>Verify Your OTP</h3>
    <p>Please enter the 6-digit OTP sent to your email.</p>
    
    <form id="otpForm">
        <div class="d-flex justify-content-center">
            <input type="text" maxlength="1" class="otp-input" id="otp1" required>
            <input type="text" maxlength="1" class="otp-input" id="otp2" required>
            <input type="text" maxlength="1" class="otp-input" id="otp3" required>
            <input type="text" maxlength="1" class="otp-input" id="otp4" required>
            <input type="text" maxlength="1" class="otp-input" id="otp5" required>
            <input type="text" maxlength="1" class="otp-input" id="otp6" required>
        </div>
        <button type="button" onclick="verifyOTP()" class="btn btn-primary mt-3">Verify OTP</button>
        <p id="errorMessage" class="error-msg"></p>
    </form>
</div>

<script>
    // Auto-focus next input field
    const inputs = document.querySelectorAll(".otp-input");
    inputs.forEach((input, index) => {
        input.addEventListener("input", (e) => {
            if (e.target.value && index < inputs.length - 1) {
                inputs[index + 1].focus();
            }
        });
        input.addEventListener("keydown", (e) => {
            if (e.key === "Backspace" && index > 0 && !e.target.value) {
                inputs[index - 1].focus();
            }
        });
    });

    // Verify OTP with PHP session
    function verifyOTP() {
        let enteredOTP = "";
        inputs.forEach(input => enteredOTP += input.value);

        fetch("check_otp.php")
        .then(response => response.text())
        .then(sessionOTP => {
            if (enteredOTP === sessionOTP.trim()) {
                alert("OTP Verified Successfully!");
                window.location.href = "index.php"; // Redirect after success
            } else {
                document.getElementById("errorMessage").innerText = "Invalid OTP. Please try again.";
            }
        })
        .catch(error => console.error("Error:", error));
    }
</script>

</body>
</html>
