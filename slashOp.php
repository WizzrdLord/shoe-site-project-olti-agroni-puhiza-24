<?php
// Include the database configuration file to establish a connection.
require 'config.php';

// Check if the request method is POST to handle form submissions.
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check if the 'action' is set in the POST data.
    if (isset($_POST['action'])) {
        $action = $_POST['action'];

        // Action: Add a new shoe
        if ($action === 'add_shoe') {
            // Sanitize and trim user inputs to prevent XSS and SQL injection.
            $shoe_name = htmlspecialchars(trim($_POST['shoe_name']));
            $shoe_brand = htmlspecialchars(trim($_POST['shoe_brand']));
            $shoe_description = htmlspecialchars(trim($_POST['shoe_description']));
            $shoe_color = htmlspecialchars(trim($_POST['shoe_color']));
            $shoe_material = htmlspecialchars(trim($_POST['shoe_material']));
            $shoe_price = filter_var($_POST['shoe_price'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
            $shoe_gender = htmlspecialchars(trim($_POST['shoe_gender']));
            $shoe_discount = filter_var($_POST['shoe_discount'], FILTER_SANITIZE_NUMBER_INT);
            $shoe_date_added = htmlspecialchars(trim($_POST['shoe_date_added']));

            // Validate that all required fields are filled in.
            if (
                empty($shoe_name) || empty($shoe_brand) || empty($shoe_description) ||
                empty($shoe_color) || empty($shoe_material) || empty($shoe_price) ||
                empty($shoe_gender) || empty($shoe_discount) || empty($shoe_date_added)
            ) {
                die("All fields are required for adding a shoe."); // Stop execution if validation fails.
            }

            // Insert the new shoe record into the database.
            $sql = "INSERT INTO `shoes-table` 
                    (shoe_name, shoe_brand, shoe_description, shoe_color, shoe_material, shoe_price, shoe_gender, shoe_discount, shoe_date_added)
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql); // Prepare the query.

            if ($stmt) {
                // Bind the parameters to the prepared statement.
                $stmt->bind_param("sssssdiss", $shoe_name, $shoe_brand, $shoe_description, $shoe_color, $shoe_material, $shoe_price, $shoe_gender, $shoe_discount, $shoe_date_added);
                if ($stmt->execute()) {
                    echo "Shoe added successfully!"; // Success message.
                } else {
                    error_log("Shoe Insert Error: " . $stmt->error); // Log the error.
                    echo "Failed to add shoe."; // User-friendly error message.
                }
                $stmt->close(); // Close the prepared statement.
            } else {
                error_log("Shoe Preparation Error: " . $conn->error); // Log the preparation error.
                echo "Error preparing the shoe query."; // User-friendly error message.
            }

        // Action: Add a new blog
        } elseif ($action === 'add_blog') {
            // Sanitize and trim user inputs.
            $blog_title = htmlspecialchars(trim($_POST['blog_title']));
            $blog_content = htmlspecialchars(trim($_POST['blog_content']));
            $blog_creation_date = htmlspecialchars(trim($_POST['blog_creation_date']));

            // Validate that all required fields are filled in.
            if (empty($blog_title) || empty($blog_content) || empty($blog_creation_date)) {
                die("All fields are required for adding a blog.");
            }

            // Insert the new blog record into the database.
            $sql = "INSERT INTO `blogs-table` (blog_title, blog_content, blog_creation_date) VALUES (?, ?, ?)";
            $stmt = $conn->prepare($sql); // Prepare the query.

            if ($stmt) {
                // Bind the parameters to the prepared statement.
                $stmt->bind_param("sss", $blog_title, $blog_content, $blog_creation_date);
                if ($stmt->execute()) {
                    echo "Blog added successfully!"; // Success message.
                } else {
                    error_log("Blog Insert Error: " . $stmt->error); // Log the error.
                    echo "Failed to add blog."; // User-friendly error message.
                }
                $stmt->close(); // Close the prepared statement.
            } else {
                error_log("Blog Preparation Error: " . $conn->error); // Log the preparation error.
                echo "Error preparing the blog query."; // User-friendly error message.
            }

        // Action: Delete a blog
        } elseif ($action === 'delete_blog') {
            // Sanitize and trim the input to prevent SQL injection and remove unwanted whitespace.
            $blog_name = htmlspecialchars(trim($_POST['blog_name']));

            // Check if the blog name is provided.
            if (empty($blog_name)) {
                die("Blog title is required for deletion."); // Prompt for missing input.
            }

            // Correctly format the DELETE query.
            $sql = "DELETE FROM `blogs-table` WHERE blog_title = ?";
            $stmt = $conn->prepare($sql); // Prepare the query.

            if ($stmt) {
                // Bind the parameter to the prepared statement.
                $stmt->bind_param("s", $blog_name);
                if ($stmt->execute()) {
                    // Check if the row was successfully deleted.
                    if ($stmt->affected_rows > 0) {
                        echo "Blog deleted successfully."; // Success message.
                    } else {
                        echo "No blog found with that title."; // Blog not found message.
                    }
                } else {
                    error_log("Blog Deletion Error: " . $stmt->error); // Log the execution error.
                    echo "Failed to delete blog."; // User-friendly error message.
                }
                $stmt->close(); // Close the prepared statement.
            } else {
                error_log("Blog Deletion Preparation Error: " . $conn->error); // Log the preparation error.
                echo "Error preparing the blog deletion query."; // User-friendly error message.
            }

        // Invalid action
        } else {
            echo "Invalid action specified.";
        }
    } else {
        echo "Action not specified.";
    }
}
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

        document.getElementById('SHOES_BUTTON').addEventListener('click', function() {
            fetch('shoesOp.php')
                .then(response => response.text())
                .then(data => {
                    changeContent(data);

                    initFormScripts();
                })
            .catch(error => console.error('Error:', error));
        });

        function initFormScripts() {
            // JS Discount Display
            const discountInput = document.getElementById('discount');
            const discountValue = document.getElementById('discount_value');
            
            if (discountInput) {
                discountInput.addEventListener('input', function () {
                    discountValue.textContent = discountInput.value;
                });
            }
        
            // JS Color Display Replacement
            const c_input = document.getElementById('color');
            const c_datalist = document.getElementById('Colors');
            const c_hiddenInput = document.getElementById('color_value');
            
            if (c_input) {
                c_input.addEventListener('input', function () {
                    const options = c_datalist.querySelectorAll('option');
                    const inputValue = c_input.value;
                    let matched = false;
                    options.forEach(option => {
                        if (option.value === inputValue) {
                            c_hiddenInput.value = option.getAttribute('data-value');
                            matched = true;
                        }
                    });
                    if (!matched) {
                        c_hiddenInput.value = '';
                    }
                });
            }
        
            // JS Material Display Replacement
            const m_input = document.getElementById('material');
            const m_datalist = document.getElementById('Materials');
            const m_hiddenInput = document.getElementById('material_value');
            
            if (m_input) {
                m_input.addEventListener('input', function () {
                    const options = m_datalist.querySelectorAll('option');
                    const inputValue = m_input.value;
                    let matched = false;
                    options.forEach(option => {
                        if (option.value === inputValue) {
                            m_hiddenInput.value = option.getAttribute('data-value');
                            matched = true;
                        }
                    });
                    if (!matched) {
                        m_hiddenInput.value = '';
                    }
                });
            }
        
            // JS Auto Date
            const today = new Date();
            const yyyy = today.getFullYear();
            const mm = String(today.getMonth() + 1).padStart(2, '0');
            const dd = String(today.getDate()).padStart(2, '0');
            const formattedDate = `${yyyy}-${mm}-${dd}`;
        
            // Set the value of the date input to today's date
            const dateInput = document.getElementById('date_added');
            if (dateInput) {
                dateInput.value = formattedDate;
            }
        }


        document.getElementById('BLOGS_BUTTON').addEventListener('click', function() {
            fetch('blogsOp.php')
                .then(response => response.text())
                .then(data => {
                    changeContent(data);
                })
                .catch(error => console.error('Error:', error));
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
    <script src="js\shoesOP.js"></script>
</body>
</html>
