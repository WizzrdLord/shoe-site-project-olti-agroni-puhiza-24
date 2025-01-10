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

if (isset($_GET['token'])) {
    $token = $_GET['token'];

    // Validate token
    $stmt = $conn->prepare("SELECT email FROM passwordreset WHERE token = ? AND expires_at > NOW()");
    $stmt->bind_param("s", $token);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo "Token is valid for email: " . $row['email'];
        // Proceed to password reset form
    } else {
        echo "Invalid reset token.";
    }

    $stmt->close();
} else {
    echo "No token provided.";
}

$conn->close();
?>

    <script src="js/theme-toggle.js"></script>
</body>
</html>