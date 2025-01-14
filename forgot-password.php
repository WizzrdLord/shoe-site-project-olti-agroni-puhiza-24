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
        <form method="post" action="">
            <input type="email" name="email" id="email" placeholder="Email" required>
            <button type="submit">Send Reset Link</button>
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
        die("Database connection failed: " . $conn->connect_error);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Sanitize and validate user input
        $email = $conn->real_escape_string($_POST['email']);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "<p style='color:red;'>Invalid email format.</p>";
            exit;
        }

        // Check if the email exists in the database
        $sql = "SELECT * FROM accounts WHERE account_address = '$email'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Generate a reset token
            $token = bin2hex(random_bytes(50));  // Secure random token

            // Store the token in the passwordreset table
            $sql = "UPDATE passwordreset SET token = '$token' WHERE email = '$email'";
            if ($conn->query($sql) === TRUE) {
                echo "<p>Token saved successfully in the database.</p>";
            } else {
                echo "<p style='color:red;'>Error saving token: " . $conn->error . "</p>";
                exit;
            }

            // Send reset password email using PHPMailer
            $mail = new PHPMailer(true);

            try {
                // Server settings
                $mail->SMTPDebug = 2;  // Enable verbose debug output
                $mail->isSMTP();
                $mail->Host = 'smtp.office365.com';  // Set the SMTP server
                $mail->SMTPAuth = true;
                $mail->Username = 'hat-shoes@outlook.com';  // SMTP username
                $mail->Password = 'hatshoes123';  // SMTP password (use app password if MFA is enabled)
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = 587;

                // Recipients
                $mail->setFrom('hat-shoes@outlook.com', 'HAT SHOES');
                $mail->addAddress($email);

                // Email content
                $resetLink = "http://localhost/shoe-site-project-olti-agroni-puhiza-24/reset-password.php?token=$token";
                $mail->isHTML(true);
                $mail->Subject = 'Password Reset Request';
                $mail->Body    = "Click <a href='$resetLink'>here</a> to reset your password.";

                // Attempt to send the email
                if ($mail->send()) {
                    echo "<p style='color:green;'>A password reset link has been sent to your email address.</p>";
                } else {
                    echo "<p style='color:red;'>Message could not be sent. Mailer Error: {$mail->ErrorInfo}</p>";
                }
            } catch (Exception $e) {
                echo "<p style='color:red;'>Mailer Error: {$mail->ErrorInfo}</p>";
            }
        } else {
            echo "<p style='color:red;'>Email not found in our records.</p>";
        }
    }
    ?>

    <script src="js/theme-toggle.js"></script>
</body>

</html>