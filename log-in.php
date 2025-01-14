<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hat Shoes Store</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap">
    <link rel="stylesheet" href="css/log-in.css">
    <script src="js/validation.js" defer></script>
</head>

<body>

    <?php require "navbar.php"; ?>

    <div class="log-in-container">
        <h1>Log in</h1>
        <p id="error-message"></p>
        <form id="form" action="index.php">
            <div>
                <input type="email" name="email" id="email-input" placeholder="Email">
            </div>

            <div>
                <input type="password" name="password" id="password-input" placeholder="Password">
            </div>

            <button type="submit">
                Log In
            </button>
        </form>

        <div class="sign-up">
            <p>Don't have an account? <a class="sign" href="sign-up.php">Sign Up</a></p>
        </div>
        <div>
            <!--<a class="forgot-password" href="forgot-password.php">Forgot password?</a>-->
        </div>
    </div>

    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "shoe-store";

    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Lidhja dështoi: " . $conn->connect_error);
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $email = $_POST['email'] ?? null;
        $password = $_POST['password'] ?? null;

        // Check if the email or password is "admin"
        if ($email == "admin" || $password == "admin") {
            header("Location: slashOp.php");
            exit; // Stop further execution after redirection
        }

        // Use prepared statements for security
        $stmt = $conn->prepare("SELECT account_password FROM accounts WHERE LOWER(account_address) = LOWER(?) AND account_password = ?");
        if (!$stmt) {
            die("Prepare failed: " . $conn->error);
        }
        $stmt->bind_param("ss", $email, $password);
        $stmt->execute();

        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            echo "Logged in successfully.";
        } else {
            echo "No account found with this email and password.";
        }
        $stmt->close();
    }

    $conn->close();
?>

    <script src="js/theme-toggle.js"></script>
</body>

</html>