<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="css/forgot-password.css">
</head>
<body>
<?php require "navbar.php"; ?>

    <div class="container">
    <h1>Forgot Password</h1>

<form method="post" action="reset-password.php">


<input type="email" name="email" id="email" placeholder="Email" required>

<button type="submit" >Send Reset Link</button>
</form>
    </div>

    <?php
require_once 'PHPMailer/src/Exception.php';
require_once 'PHPMailer/src/PHPMailer.php';
require_once 'PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "shoe-store";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];

    // Check if the email exists in the database
    $sql = "SELECT * FROM accounts WHERE account_address = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Generate a reset token
        $token = bin2hex(random_bytes(50));  // Secure random token

        // Store the token in the database (token expiration can also be added)
        $sql = "UPDATE passwordreset SET token = '$token' WHERE email = '$email'";
        $conn->query($sql);

        // Send reset password email using PHPMailer
        $mail = new PHPMailer(true);

        try {
            // Server settings
            $mail->isSMTP();
            $mail->Host = 'smtp.example.com';  // Set the SMTP server
            $mail->SMTPAuth = true;
            $mail->Username = 'hat-shoes.noreply@example.com';  // SMTP username
            $mail->Password = 'your_password';  // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            // Recipients
            $mail->setFrom('hat-shoes.noreply@example.com', 'Hat Shoes');
            $mail->addAddress($email);

            // Content
            $resetLink = "http://localhost/shoe-site-project-olti-agroni-puhiza-24/reset-password.php?token=$token";
            $mail->isHTML(true);
            $mail->Subject = 'Password Reset Request';
            $mail->Body    = "Click <a href='$resetLink'>here</a> to reset your password.";

            $mail->send();

            // Redirect to reset page with token as URL parameter
            header("Location: reset-password.php?token=$token");
            exit; // Make sure no further code is executed after redirection
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        echo "Email not found!";
    }
}
?>


    <script src="js/theme-toggle.js"></script>
</body>
</html>