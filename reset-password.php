<?php
$token = $_GET['token'] ?? '';

if (empty($token)) {
    die("Invalid reset token.");
}
?>

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
<div class="container">
    <h1>Reset Password</h1>

<form method="post" action="reset-password-handler.php">


<input type="password" name="password" id="password" placeholder="Password">

<button >Reset Password</button>
</form>
    </div>
    <script src="js/theme-toggle.js"></script>
</body>
</html>
