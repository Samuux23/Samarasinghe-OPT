<?php
session_start();
include 'connect.php';

if(isset($_POST['verify'])){
    $enteredOtp = implode('', $_POST['otp']); // Combine OTP digits

    if($enteredOtp == $_SESSION['otp']){
        // If OTP matches, insert the user into the database
        $customerName = $_SESSION['customerName'];
        $customerEmail = $_SESSION['customerEmail'];
        $customerContact = $_SESSION['customerContact'];
        $customerPass = $_SESSION['customerPass'];

        $insertQuery = "INSERT INTO customer (CustomerName, CustomerEmail, CustomerContact, CustomerPassword)
                        VALUES ('$customerName', '$customerEmail', '$customerContact', '$customerPass')";

        if($conn->query($insertQuery) === TRUE){
            // Clear session data
            unset($_SESSION['otp']);
            unset($_SESSION['customerName']);
            unset($_SESSION['customerEmail']);
            unset($_SESSION['customerContact']);
            unset($_SESSION['customerPass']);

            // Redirect to home page
            header("Location: loginUI.php");//--------------------------------------------------
        } else {
            header("Location: verifyOtp.php?error=Error: " . $conn->error);
        }
    } else {
        // If OTP does not match
        header("Location: verifyOtp.php?error=Invalid OTP!");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify OTP</title>
    <style>
        body {
            background-color: #ecebff;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .otp-container {
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            text-align: center;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
        }

        .otp-container h2 {
            color: #333;
            margin-bottom: 10px;
        }

        .otp-container p {
            color: #666;
            font-size: 14px;
            margin-bottom: 20px;
        }

        .otp-input {
            width: 50px;
            height: 50px;
            font-size: 24px;
            text-align: center;
            margin: 0 5px;
            border: 1px solid #ccc;
            border-radius: 6px;
            outline: none;
        }

        .otp-input:focus {
            border-color: #007bff;
        }

        .verify-btn {
            background-color: #8f242d;
            color: white;
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            margin-top: 20px;
            transition: all 0.5s;
        }

        .verify-btn:hover {
            background-color: #4d060c;
        }

        .error-message {
            color: red;
            margin-top: 10px;
            font-size: 14px;
        }

        .resend-link {
            margin-top: 15px;
            font-size: 14px;
        }

        .resend-link a {
            color: #007bff;
            text-decoration: none;
        }

        .resend-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="otp-container">
    <h2>Verify</h2>
    <p>Your code was sent to you via email</p>
    <form action="verifyOtp.php" method="POST">
        <div>
            <input type="text" class="otp-input" name="otp[]" maxlength="1" required>
            <input type="text" class="otp-input" name="otp[]" maxlength="1" required>
            <input type="text" class="otp-input" name="otp[]" maxlength="1" required>
            <input type="text" class="otp-input" name="otp[]" maxlength="1" required>
            <input type="text" class="otp-input" name="otp[]" maxlength="1" required>
            <input type="text" class="otp-input" name="otp[]" maxlength="1" required>
        </div>
        <button type="submit" class="verify-btn" name="verify">Verify</button>
    </form>
    <div class="error-message" id="errorMessage">
        <?php
        if (isset($_GET['error'])) {
            echo htmlspecialchars($_GET['error']);
        }
        ?>
    </div>
    <div class="resend-link">
        <!-- Didn't receive the code? <a href="#">Request again</a> -->
    </div>
</div>

<script>
    window.onload = function() {
        var errorMessage = document.getElementById("errorMessage");
        if (errorMessage.innerHTML !== "") {
            errorMessage.style.display = "block";
        }

        // Focus auto-move logic for OTP inputs
        const inputs = document.querySelectorAll('.otp-input');
        inputs.forEach((input, index) => {
            input.addEventListener('input', () => {
                if (input.value.length === 1 && index < inputs.length - 1) {
                    inputs[index + 1].focus();
                }
            });
        });
    }
</script>

</body>
</html>
