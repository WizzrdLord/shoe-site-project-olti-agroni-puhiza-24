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


<input type="email" name="email" id="email" placeholder="Email">

<button >Send Reset Link</button>
</form>
    </div>

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
    $email = trim($_POST['email']);

    // Check if email exists in the users table
    $stmt = $conn->prepare("SELECT * FROM accounts WHERE account_address = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Generate a unique token
        $token = bin2hex(random_bytes(50));
        $expires_at = date("Y-m-d H:i:s", strtotime("+1 hour")); // Token valid for 1 hour

        // Store the token in the password_reset_tokens table
        $stmt = $conn->prepare("INSERT INTO passwordreset(email, token, expires_at) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $email, $token, $expires_at);
        $stmt->execute();

        // Display the reset link (for demo purposes)
        $resetLink = "http://localhost/shoe-site-project/reset-password.php?token=$token";
        echo "Password reset link: <a href='$resetLink'>$resetLink</a>";
    } else {
        echo "No user found with that email address.";
    }
}



?>

    <script src="js/theme-toggle.js"></script>
</body>
</html>