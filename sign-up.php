<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hat Shoes Store</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap">
    <link rel="stylesheet" href="css/sign-up.css">
    <script src="js/validation.js" defer></script>
</head>
<body>
    
    <?php require "navbar.php"; ?>

   <div class="sign-up-container">
    <h1>Create an account</h1>
    <p>Enter your details below</p>
    <p id="error-message"></p>
    <form id="form">
        <div>
            <input type="text" name="firstname" id="firstname-input" placeholder="First Name" >
        </div>

        <div>
            <input type="text" name="lastname" id="lastname-input" placeholder="Last Name" >
        </div>

        <div>
            <input type="email" name="email" id="email-input" placeholder="Email" >
        </div>

        <div>
            <input type="password" name="password" id="password-input" placeholder="Password" >
        </div>
         <button type="submit">Create Account</button>
    </form>

   
    <div class="login">
    <p>Already have an account? <a class="log" href="log-in.php">Log in</a></p>
     </div>
   </div>
</body>
</html>