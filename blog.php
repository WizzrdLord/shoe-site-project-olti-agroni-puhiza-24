<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "shoe-store";

    $conn = new mysqli($servername,$username,$password,$database);
    if($conn->connect_error){
        
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hat Shoes Blog</title>
    <link rel="stylesheet" href="font-awesome\css\font-awesome.min.css">
    <link rel="stylesheet" href="css/abt.css">
</head>
<body>
    <?php require "navbar.php"; ?>

    
</body>
</html>