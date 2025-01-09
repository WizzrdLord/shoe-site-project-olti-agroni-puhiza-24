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
    <script src="js/theme-toggle.js"></script>
</body>
</html>