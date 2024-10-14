<?php
// Include the database connection file
require 'connect.php';

// Include PHPMailer files
require '../vendor/phpmailer/phpmailer/src/PHPMailer.php';
require '../vendor/phpmailer/phpmailer/src/SMTP.php';
require '../vendor/phpmailer/phpmailer/src/Exception.php';

// Use PHPMailer classes
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Fetch the messages from the database
$query = "SELECT * FROM messages";
$result = $conn->query($query);

// Function to send reply using PHPMailer
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $replyMessage = $_POST['replyMessage'];
    $recipientEmail = $_POST['recipientEmail'];
    $subject = "Reply to: " . $_POST['subject'];

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
        $mail->setFrom('bansab990@gmail.com', 'Your Name');        // From email and sender name
        $mail->addAddress($recipientEmail);                       // Add recipient email

        // Email content
        $mail->isHTML(true);                                      // Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body = nl2br($replyMessage);                       // Convert new lines to <br> for HTML emails
        $mail->AltBody = $replyMessage;                           // Plain text body

        // Send the email
        $mail->send();

        // Redirect back with success message in query string
        header("Location: message.php?success=true&email=$recipientEmail");
        exit();

    } catch (Exception $e) {
        // Handle PHPMailer errors gracefully and log the error for debugging
        error_log("Mailer Error: {$mail->ErrorInfo}");
        echo "Message could not be sent. Please try again.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messages</title>
    <link rel="stylesheet" href="message.css">
   
    <!-- Box icons link -->
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css" />
    <!-- Remix icon link -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet" />
    <!-- Google fonts link -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Afacad:ital,wght@0,400..700;1,400..700&display=swap" rel="stylesheet" />
</head>
<body>
<header id="top">
    <img src="../img/samarasinghe logo.png" alt="" class="logo" />    
    <nav>
        <ul class="nav_links">
            <li><a href="staffHome.php">Home</a></li>
            <li><a href="orders.php">Orders</a></li>
            <li><a href="message.php">Messages</a></li>
            <li><a href="appointmentManage.php">Appointment</a></li>
        </ul>
    </nav>
    <p>
        <a href="../loginUI.php" class="logout-icon"><i class="bx bxs-user-minus"></i></a>
    </p>
</header>

<table>
    <thead>
        <tr>
            <th>Message ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Subject</th>
            <th>Message</th>
            <th>Reply</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // Check if there are messages to display
        if ($result->num_rows > 0) {
            // Fetch each message as an associative array
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['subject'] . "</td>";
                echo "<td>" . $row['message'] . "</td>";
                echo "<td><a href='#' onclick='showReplyForm(" . json_encode($row) . ")'>Reply</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No messages found</td></tr>";
        }
        ?>
    </tbody>
</table>

<!-- Reply form -->
<div id="replyForm" style="display:none;">
    <form method="POST" action="message.php">
        <input type="hidden" name="recipientEmail" id="recipientEmail" />
        <input type="hidden" name="subject" id="subject" />
        <label for="replyMessage">Reply Message:</label>
        <textarea name="replyMessage" id="replyMessage" rows="4" cols="50" required></textarea><br>
        <button type="submit">Send Reply</button>
    </form>
</div>

<script>
    function showReplyForm(message) {
        document.getElementById('recipientEmail').value = message.email;
        document.getElementById('subject').value = message.subject;
        document.getElementById('replyMessage').value = "Replying to: " + message.message;
        document.getElementById('replyForm').style.display = 'block';
    }

    // Check if there is a success message in the URL and show an alert
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.has('success') && urlParams.get('success') === 'true') {
        const email = urlParams.get('email');
        alert("Reply sent to " + email);
    }
</script>

</body>
</html>
