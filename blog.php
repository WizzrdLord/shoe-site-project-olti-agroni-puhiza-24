<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "shoe-store";

    $conn = new mysqli($servername,$username,$password,$database);
    if($conn->connect_error){
        die("Lidhja dështoi: ".$conn->connect_error);
    }
    $sql = "SHOW COLUMNS FROM `blogs-table`";
    $result = $conn->query($sql);
    
?>

<!DOCTYPE html>
<html lang="en">    
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hat Shoes Blog</title>
    <link rel="stylesheet" href="font-awesome\css\font-awesome.min.css">
    <link rel="stylesheet" href="css/blog.css">
</head>
<body>
    <?php require "navbar.php"; ?>
    <main>
    <?php
    while ($row = $result->fetch_assoc()) {
        echo "<div class=\"main-left\">";
        echo "<div id=\"mainArtikulli\" style=\"margin: 2% 5% 2% 5%;\">";
        echo "    <h1 style=\"margin:3% 5% 3% 5%;\">" . $row['blog_title'] . "</h1>";
        echo "    <p class=\"article\">" . $row['blog_content'] ."</p>";
        echo "    <p class=\"date\">" . $row['blog_creation_date'] . "</p>";
        echo "</div>";
        echo "</div>";

        /*echo "<p>". $row['blog_id'] . "</p>";
        echo "<h>". $row['blog_title'] . "</h>";
        echo "<p>". $row['blog_content'] . "</p>";
        echo "<p>". $row['blog_creation_date'] . "</p>";
        echo "TEST1";*/
    }
    ?>
    </main>
    <script src="js/theme-toggle.js"></script>
</body>
</html>