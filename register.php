<?php
include 'connect.php';
session_start();

// Include PHPMailer files
require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/phpmailer/src/SMTP.php';
require 'vendor/phpmailer/phpmailer/src/Exception.php';

// Use PHPMailer classes
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if (isset($_POST['register'])) {
    $customerName = $_POST['customerName'];
    $customerEmail = $_POST['customerEmail'];
    $customerContact = $_POST['customerContact'];
    $customerPass = $_POST['customerPass'];
    // $customerPass = md5($customerPass);  // Hash the password

    // Check if the email already exists in the database
    $checkEmail = "SELECT * FROM customer WHERE CustomerEmail = '$customerEmail'";
    $result = $conn->query($checkEmail);
    
    if ($result->num_rows > 0) {
        // Email already exists
        header("Location: registerUI.php?error=Email Address Already Exists!");
    } else {
        // Generate a random OTP
        $otp = rand(100000, 999999);
        $_SESSION['otp'] = $otp; // Store OTP in session
        $_SESSION['customerName'] = $customerName;
        $_SESSION['customerEmail'] = $customerEmail;
        $_SESSION['customerContact'] = $customerContact;
        $_SESSION['customerPass'] = $customerPass;

        // Initialize PHPMailer
        $mail = new PHPMailer(true);

        try {
            // Server settings
            $mail->isSMTP();                                          // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';                           // Gmail SMTP server
            $mail->SMTPAuth = true;                                   // Enable SMTP authentication
            $mail->Username = 'bansab990@gmail.com';                  // Your Gmail address
            $mail->Password = 'fhjehspsrdspeezb';                     // Use your Gmail App Password here (NOT your regular password)
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;          // Enable SSL encryption
            $mail->Port = 465;                                        // SSL port for SMTP

            // Recipients
            $mail->setFrom('bansab990@gmail.com', 'Samarasinghe OPT');     // From email and sender name
            $mail->addAddress($customerEmail, $customerName);          // Add recipient email and name

            // Email content
            $mail->isHTML(true);                                      // Set email format to HTML
            $mail->Subject = 'Your OTP Verification Code';
            $mail->Body = "Hello $customerName, your OTP code is <b>$otp</b>";  // HTML body
            $mail->AltBody = "Hello $customerName, your OTP code is $otp";      // Plain text body

            // Send the email
            $mail->send();
            
            // Redirect to OTP verification page if email sent successfully
            header("Location: verifyOtp.php");

        } catch (Exception $e) {
            // Handle PHPMailer errors gracefully and log the error for debugging
            error_log("Mailer Error: {$mail->ErrorInfo}");
            header("Location: registerUI.php?error=Message could not be sent. Please try again.");
        }
    }
}
?>
