<?php
require 'vendor/autoload.php'; // For PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$servername = "localhost";
$username = "root";
$password = "";
$database = "shoe-store";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];

    // Check if the email exists in the database
    $stmt = $conn->prepare("SELECT account_address FROM accounts WHERE account_address = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
        echo "No account found with this email.";
        exit;
    }

    // Generate a unique token
    $token = bin2hex(random_bytes(32));
    $expires_at = date("Y-m-d H:i:s", strtotime("+1 hour"));

    // Save token to `password_resets` table
    $stmt = $conn->prepare("INSERT INTO password_resets (email, token, expires_at) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $email, $token, $expires_at);
    $stmt->execute();

    // Prepare the reset link
    $reset_link = "http://localhost/shoe-site-project/auth/reset-password.php?token=$token";

    // Send the reset link via PHPMailer
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Replace with your SMTP server
        $mail->SMTPAuth = true;
        $mail->Username = 'your_email@example.com'; // Replace with your email
        $mail->Password = 'your_password';         // Replace with your email password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->setFrom('noreply@example.com', 'Shoe Store');
        $mail->addAddress($email);

        $mail->Subject = 'Password Reset Request';
        $mail->Body = "Click the link below to reset your password:\n\n$reset_link";

        $mail->send();
        echo "A password reset link has been sent to your email.";
    } catch (Exception $e) {
        echo "Failed to send email: " . $mail->ErrorInfo;
    }
}
$conn->close();
?>
