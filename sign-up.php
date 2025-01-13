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
    <form id="form" method="POST">
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

   <?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$database = "shoe-store";

// Create a connection
$conn = new mysqli($servername, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate form inputs
    if (empty($_POST['firstname']) || empty($_POST['lastname']) || empty($_POST['email']) || empty($_POST['password'])) {
        die("Error: All fields are required.");
    }

    // Sanitize inputs to prevent SQL injection
    $account_name = $conn->real_escape_string($_POST['firstname']);
    $account_lastname = $conn->real_escape_string($_POST['lastname']);
    $account_email = $conn->real_escape_string($_POST['email']);
    $account_password = $conn->real_escape_string($_POST['password']);

    // Hash the password for security
    $hashed_password = password_hash($account_password, PASSWORD_DEFAULT);

    // SQL to insert a new account
    $sql = "INSERT INTO accounts (account_name, account_lastname, account_address, account_password) VALUES (?, ?, ?, ?)";

    // Prepare and execute the statement
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        die("Error preparing statement: " . $conn->error);
    }

    // Bind parameters to the query
    $stmt->bind_param("ssss", $account_name, $account_lastname, $account_email, $hashed_password);

    // Execute the query and check if it was successful
    if ($stmt->execute()) {
        echo "Account successfully created.";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request method.";
}
?>

   <script src="js/theme-toggle.js"></script>
</body>
</html>