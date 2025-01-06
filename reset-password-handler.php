<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "shoe-store";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $token = $_POST['token'] ?? '';
    $new_password = $_POST['password'] ?? '';

    if (empty($token) || empty($new_password)) {
        die("All fields are required.");
    }

    // Verify token and expiry
    $stmt = $conn->prepare("SELECT email, expires_at FROM password_resets WHERE token = ?");
    $stmt->bind_param("s", $token);
    $stmt->execute();
    $result = $stmt->get_result();
    $reset_data = $result->fetch_assoc();

    if (!$reset_data || strtotime($reset_data['expires_at']) < time()) {
        die("Invalid or expired reset token.");
    }

    $email = $reset_data['email'];
    $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

    // Update password in `accounts` table
    $stmt = $conn->prepare("UPDATE accounts SET account_password = ? WHERE account_address = ?");
    $stmt->bind_param("ss", $hashed_password, $email);
    if ($stmt->execute()) {
        echo "Your password has been reset successfully.";
    } else {
        echo "Failed to reset password. Please try again.";
    }

    // Delete token from `password_resets` table
    $stmt = $conn->prepare("DELETE FROM password_resets WHERE token = ?");
    $stmt->bind_param("s", $token);
    $stmt->execute();

    $stmt->close();
}

$conn->close();
?>
