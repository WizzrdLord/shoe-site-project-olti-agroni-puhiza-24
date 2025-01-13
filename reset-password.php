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
    // Database Connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "shoe-store";

    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if (isset($_GET['token'])) {
        $token = $_GET['token'];

        // Fetch the email associated with the token and check for expiration (optional)
        $sql = "SELECT * FROM passwordreset WHERE token = '$token'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $tokenCreationTime = strtotime($row['created_at']); // Assuming 'created_at' stores the token's creation time
            $tokenExpiryTime = 3600; // 1 hour in seconds

            if (time() - $tokenCreationTime > $tokenExpiryTime) {
                echo "This token has expired. Please request a new one.";
            } else {
                // If token is valid and not expired, allow password reset
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    // Check if passwords match
                    if ($_POST['password'] !== $_POST['confirm-password']) {
                        echo "Passwords do not match. Please try again.";
                    } else {
                        // Sanitize and hash the new password
                        $newPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);

                        // Update the password in the accounts table
                        $sql = "UPDATE accounts SET account_password = '$newPassword' WHERE account_address = (SELECT email FROM passwordreset WHERE token = '$token')";
                        if ($conn->query($sql) === TRUE) {
                            echo "Password has been reset successfully!";
                        } else {
                            echo "Error updating password: " . $conn->error;
                        }
                    }
                }
            }
        } else {
            echo "Invalid or expired token.";
        }
    }   
?>
</body>
</html>
