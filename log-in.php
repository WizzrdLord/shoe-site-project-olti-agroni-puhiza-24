<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hat Shoes Store</title>
    <link rel="stylesheet" href="css/log-in.css">
    <script src="js/validation.js" defer></script>
</head>

<body>
    
    <?php require "navbar.php"; ?>

    <div class="log-in-container">
        <h1>Log in</h1>
        <p id="error-message"></p>
        <form id="form" method="POST">
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

    <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "shoe-store";

        $conn = new mysqli($servername, $username, $password, $database);

        if($conn->connect_error) {
            die("Lidhja dështoi: " . $conn->connect_error);
        }

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $email = $_POST['email'];
            $password = $_POST['password'];

            $stmt = $conn->prepare("SELECT account_password FROM accounts WHERE account_address = ?");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $stmt->bind_result($hashed_password);
            $stmt->fetch();

            if (password_verify($password, $hashed_password)){
                echo "Login successfull!";
            } else {
                echo "Invalid email or password";
            }

            $stmt->close();
        }
    ?>
</body>
</html>