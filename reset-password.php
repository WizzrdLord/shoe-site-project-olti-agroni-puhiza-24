<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link rel="stylesheet" href="css/reset-password.css">
</head>
<body>
    <?php require "navbar.php"; ?>
    <h1>Reset Password</h1>
    <?php
    // Debugging: Enable error reporting
    ini_set('display_errors', 1);
    error_reporting(E_ALL); 

    // Check for the token in the URL
    $token = isset($_GET['token']) ? $_GET['token'] : null;

    if (!empty($token)) {
        echo "Token found: " . htmlspecialchars($token);
    ?>
        <form method="POST" action="reset-password.php">
            <div>
                <input type="password" name="password" id="password" placeholder="Password" required>
            </div>
            <div>
                <input type="password" name="confirm-password" id="confirm-password" placeholder="Confirm Password" required>
            </div>
            <input type="hidden" name="token" value="<?php echo htmlspecialchars($token); ?>">
            <button type="submit">Reset Password</button>
        </form>
    <?php
    } else {
        echo "Token is missing or invalid.";
    }
    ?>

    <?php
    // Database Connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "shoe-store";

    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Process Form Submission
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Check for required fields
        if (isset($_POST['token'], $_POST['password'], $_POST['confirm-password'])) {
            $token = $_POST['token'];
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm-password'];

            // Validate password and confirm-password match
            if ($password !== $confirm_password) {
                echo "Passwords do not match.";
                exit;
            }

            // Hash the new password
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Check if the token exists and is not expired
            $stmt = $conn->prepare("SELECT * FROM passwordreset WHERE token = ? AND expires_at > NOW()");
            $stmt->bind_param("s", $token);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                // Token is valid
                $row = $result->fetch_assoc();
                $email = $row['email'];

                // Update the user's password in the accounts table
                $stmt = $conn->prepare("UPDATE accounts SET account_password = ? WHERE account_address = ?");
                $stmt->bind_param("ss", $hashed_password, $email);
                $stmt->execute();

                // Delete the used token
                $stmt = $conn->prepare("DELETE FROM passwordreset WHERE token = ?");
                $stmt->bind_param("s", $token);
                $stmt->execute();

                echo "Password reset successful. You can now log in.";
            } else {
                echo "Invalid or expired token.";
            }
        } else {
            echo "Token or password is missing.";
        }
    }
?>
</body>
</html>
