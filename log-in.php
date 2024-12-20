<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hat Shoes Store</title>
    <link rel="stylesheet" href="css/log-in.css">
    <script src="js/validation.js" defer></script>
    <link rel="icon" type="image/png" href="images\logo_new.png">
</head>
<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "shoe-store";

    $conn = new mysqli($servername,$username,$password,$database);
    if($conn->connect_error){
        die("Lidhja dështoi: ".$conn->connect_error);
    }
    $sql = "SELECT * FROM `accounts` ORDER BY account_id DESC";
    $result = $conn->query($sql);
?>
<body>
    
    <?php require "navbar.php"; ?>

    <div class="log-in-container">
        <h1>Log in</h1>
        <p id="error-message"></p>
        <form id="form">
            <div>
                <input type="email" name="email" id="email-input" placeholder="Email" >
            </div>

            <div>
                <input type="password" name="password" id="password-input" placeholder="Password" >
            </div>

            <button type="submit">
                Log In
            </button>
       </form>

       <div class="sign-up">
        <p>Don't have an account? <a class="sign" href="sign-up.php">Sign Up</a></p>
       </div>
    </div>
</body>
</html>