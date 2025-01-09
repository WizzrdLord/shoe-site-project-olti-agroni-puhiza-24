<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "shoe-store";

    // Establish the database connection
    $conn = new mysqli($servername, $username, $password, $database);
    if ($conn->connect_error) {
        die("Lidhja deshtoj: " . $conn->connect_error);
    }

    // Handling form submission (via AJAX)
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $blog_title = mysqli_real_escape_string($conn, $_POST['blog_title']);
        $blog_content = mysqli_real_escape_string($conn, $_POST['blog_content']);
        $blog_creation_date = $_POST['blog_creation_date'];

        // Insert into the database (make sure the blog_id is auto-incremented)
        $sql = "INSERT INTO `blogs-table` (blog_title, blog_content, blog_creation_date) 
                VALUES ('$blog_title', '$blog_content', '$blog_creation_date')";

        // Execute the query
        if ($conn->query($sql) === TRUE) {
            echo "Bllogu u shtua me sukses!"; // Success message
        } else {
            echo "ERROR: " . $sql . "<br>" . $conn->error; // Error message
        }
    }

    // Close the connection
    $conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/slashOp.css">
    <link rel="icon" type="image/png" href="images\logo_new.png">
    <title>/op panel</title>
</head>
<body>
    <header>
        <img src="images\admin_logo.png" class="slashOpLogo">
        <p class="headerText">/op paneli - ⚠️</p>
    </header>
    <main>
        <div class="sidebar">
            <button id="SHOES_BUTTON" class="tab"><img class="tab_img" src="images/n_shoe.svg"><p class="tab_text">Këpucët</p></button>
            <button id="BLOGS_BUTTON" class="tab"><img class="tab_img" src="images/n_blog.svg"><p class="tab_text">Blogjet</p></button>
            <button id="ACCOUNTS_BUTTON" class="tab"><img class="tab_img" src="images/n_about.svg"><p class="tab_text">Llogaritë</p></button>
            <button id="ISSUES_BUTTON" class="tab"><img class="tab_img" src="images/admin_logo_black.png"><p class="tab_text">Raporto Error</p></button>
        </div>
        <div class="mainPanel" id="change_here">
            <!-- Content will be dynamically inserted here -->
        </div>
    </main>

    <script>
        // Function to change the content of the main panel
        function changeContent(content) {
            const mainPanel = document.getElementById('change_here');
            mainPanel.innerHTML = content;
        }

        // Event listener for "Këpucët" button
        document.getElementById('SHOES_BUTTON').addEventListener('click', function() {
            changeContent('<p>THE SHOES PANEL GOES HERE!!!!</p>');
        });

        // Event listener for "Blogjet" button
        document.getElementById('BLOGS_BUTTON').addEventListener('click', function() {
            // Fetch the content from blogsOp.php using AJAX
            fetch('blogsOp.php')
                .then(response => response.text())  // Get the response as text
                .then(data => {
                    // Insert the content from blogsOp.php into the main panel
                    changeContent(data);
                })
                .catch(error => console.error('Error:', error)); // Handle any errors
        });

        // Event listener for "Llogaritë" button
        document.getElementById('ACCOUNTS_BUTTON').addEventListener('click', function() {
            changeContent('<p>ACCOUNT DELETION AND STUFF GO HERE</p>');
        });

        // Event listener for "Raporto Error" button
        document.getElementById('ISSUES_BUTTON').addEventListener('click', function() {
            changeContent('<p>THERE ARE NO ISSUES! YOU HAVE ISSUES!</p>');
        });

        // Handle form submission via AJAX in blogsOp.php
        // Handle form submission via AJAX in blogsOp.php
        document.querySelector('form').addEventListener('submit', function(event) {
            // Prevent the form from submitting normally
            event.preventDefault();

            const formData = new FormData(event.target); // Get form data

            // Send the form data to blogsOp.php via AJAX
            fetch('blogsOp.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())  // Get the response from the server
            .then(data => {
                console.log('Form submitted successfully:', data);
                // Optionally display a success message or update the content after form submission
                alert('Bllogu u shtua me sukses!');
            })
            .catch(error => console.error('Error:', error));  // Handle any errors
        });

    </script>
</body>
</html>
