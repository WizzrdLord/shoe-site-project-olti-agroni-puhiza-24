<?php
require 'config.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['action'])) {
        $action = $_POST['action'];

        if ($action === 'add_shoe') {
            $shoe_name = htmlspecialchars(trim($_POST['shoe_name']));
            $shoe_brand = htmlspecialchars(trim($_POST['shoe_brand']));
            $shoe_description = htmlspecialchars(trim($_POST['shoe_description']));
            $shoe_color = htmlspecialchars(trim($_POST['shoe_color']));
            $shoe_material = htmlspecialchars(trim($_POST['shoe_material']));
            $shoe_price = filter_var($_POST['shoe_price'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
            $shoe_gender = htmlspecialchars(trim($_POST['shoe_gender']));
            $shoe_discount = filter_var($_POST['shoe_discount'], FILTER_SANITIZE_NUMBER_INT);
            $shoe_date_added = htmlspecialchars(trim($_POST['shoe_date_added']));
<<<<<<< Updated upstream
<<<<<<< Updated upstream
<<<<<<< Updated upstream

=======
        
>>>>>>> Stashed changes
=======
        
>>>>>>> Stashed changes
=======
        
>>>>>>> Stashed changes
            if (
                empty($shoe_name) || empty($shoe_brand) || empty($shoe_description) ||
                empty($shoe_color) || empty($shoe_material) || empty($shoe_price) ||
                empty($shoe_gender) || empty($shoe_discount) || empty($shoe_date_added)
            ) {
<<<<<<< Updated upstream
<<<<<<< Updated upstream
<<<<<<< Updated upstream
                die("All fields are required for adding a shoe.");
            }

            $sql = "INSERT INTO `shoes-table` (shoe_name, shoe_brand, shoe_description, shoe_color, shoe_material, shoe_price, shoe_gender, shoe_discount, shoe_date_added)
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            if ($stmt) {
                $stmt->bind_param("sssssdiss", $shoe_name, $shoe_brand, $shoe_description, $shoe_color, $shoe_material, $shoe_price, $shoe_gender, $shoe_discount, $shoe_date_added);
                if ($stmt->execute()) {
                    echo "Shoe added successfully!";
                } else {
                    error_log("Shoe Insert Error: " . $stmt->error);
                    echo "Failed to add shoe.";
                }
                $stmt->close();
            } else {
                error_log("Shoe Preparation Error: " . $conn->error);
                echo "Error preparing the shoe query.";
            }

=======
                echo "All fields are required for adding a shoe.";
                exit;
            }
        
            $baseDir = 'images';
            
            if (!is_dir($baseDir)) {
                mkdir($baseDir, 0755, true);
            }
        
            $folders = glob($baseDir . '\\Prod_*', GLOB_ONLYDIR);
            $nextFolderNumber = count($folders) + 1;
            $productFolder = $baseDir . "\\Prod_$nextFolderNumber";
        
            if (!mkdir($productFolder, 0755, true)) {
                echo "Failed to create folder for product images.";
                exit;
            }
        
            $imagePaths = [];
            if (isset($_FILES['images']) && $_FILES['images']['error'][0] === UPLOAD_ERR_OK) {
                $totalFiles = count($_FILES['images']['name']);
                
                if ($totalFiles != 4) {
                    echo "Please upload exactly 4 images.";
                    exit;
                }
        
                for ($i = 0; $i < $totalFiles; $i++) {
                    $fileTmpPath = $_FILES['images']['tmp_name'][$i];
                    $fileName = basename($_FILES['images']['name'][$i]);
                    $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
        
                    $allowedExtensions = ['jpg', 'jpeg', 'png'];
                    if (!in_array(strtolower($fileExtension), $allowedExtensions)) {
                        echo "Invalid file type for image " . ($i + 1) . ". Allowed types are: " . implode(", ", $allowedExtensions);
                        exit;
                    }
        
                    $newFileName = "image" . ($i + 1) . ".$fileExtension";
                    $fileDestination = $productFolder . "\\" . $newFileName;
        
                    if (move_uploaded_file($fileTmpPath, $fileDestination)) {
                        $imagePaths[] = $fileDestination;
                    } else {
                        echo "Failed to upload image" . ($i + 1);
                        exit;
                    }
                }
            } else {
                echo "No files uploaded or error uploading files.";
                exit;
            }
        
            $sql = "INSERT INTO shoes_table (
                shoe_name, shoe_brand, shoe_description, shoe_color, shoe_material, shoe_price, 
                shoe_gender, shoe_discount, shoe_date_added, image1, image2, image3, image4
            ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        
            $stmt = $conn->prepare($sql);
            if ($stmt) {
                $stmt->bind_param(
                    "sssssdissssss",
                    $shoe_name, $shoe_brand, $shoe_description, $shoe_color, $shoe_material, $shoe_price,
                    $shoe_gender, $shoe_discount, $shoe_date_added,
                    $imagePaths[0], $imagePaths[1], $imagePaths[2], $imagePaths[3]
                );
        
                if ($stmt->execute()) {
                    echo "Shoe added successfully!";
                } else {
                    error_log("Shoe Insert Error: " . $stmt->error);
                    echo "Failed to add shoe.";
                }
                $stmt->close();
            } else {
                error_log("Shoe Preparation Error: " . $conn->error);
                echo "Error preparing the shoe query.";
            }
>>>>>>> Stashed changes
=======
                echo "All fields are required for adding a shoe.";
                exit;
            }
        
            $baseDir = 'images';
            
            if (!is_dir($baseDir)) {
                mkdir($baseDir, 0755, true);
            }
        
            $folders = glob($baseDir . '\\Prod_*', GLOB_ONLYDIR);
            $nextFolderNumber = count($folders) + 1;
            $productFolder = $baseDir . "\\Prod_$nextFolderNumber";
        
            if (!mkdir($productFolder, 0755, true)) {
                echo "Failed to create folder for product images.";
                exit;
            }
        
            $imagePaths = [];
            if (isset($_FILES['images']) && $_FILES['images']['error'][0] === UPLOAD_ERR_OK) {
                $totalFiles = count($_FILES['images']['name']);
                
                if ($totalFiles != 4) {
                    echo "Please upload exactly 4 images.";
                    exit;
                }
        
                for ($i = 0; $i < $totalFiles; $i++) {
                    $fileTmpPath = $_FILES['images']['tmp_name'][$i];
                    $fileName = basename($_FILES['images']['name'][$i]);
                    $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
        
                    $allowedExtensions = ['jpg', 'jpeg', 'png'];
                    if (!in_array(strtolower($fileExtension), $allowedExtensions)) {
                        echo "Invalid file type for image " . ($i + 1) . ". Allowed types are: " . implode(", ", $allowedExtensions);
                        exit;
                    }
        
                    $newFileName = "image" . ($i + 1) . ".$fileExtension";
                    $fileDestination = $productFolder . "\\" . $newFileName;
        
                    if (move_uploaded_file($fileTmpPath, $fileDestination)) {
                        $imagePaths[] = $fileDestination;
                    } else {
                        echo "Failed to upload image" . ($i + 1);
                        exit;
                    }
                }
            } else {
                echo "No files uploaded or error uploading files.";
                exit;
            }
        
            $sql = "INSERT INTO shoes_table (
                shoe_name, shoe_brand, shoe_description, shoe_color, shoe_material, shoe_price, 
                shoe_gender, shoe_discount, shoe_date_added, image1, image2, image3, image4
            ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        
            $stmt = $conn->prepare($sql);
            if ($stmt) {
                $stmt->bind_param(
                    "sssssdissssss",
                    $shoe_name, $shoe_brand, $shoe_description, $shoe_color, $shoe_material, $shoe_price,
                    $shoe_gender, $shoe_discount, $shoe_date_added,
                    $imagePaths[0], $imagePaths[1], $imagePaths[2], $imagePaths[3]
                );
        
                if ($stmt->execute()) {
                    echo "Shoe added successfully!";
                } else {
                    error_log("Shoe Insert Error: " . $stmt->error);
                    echo "Failed to add shoe.";
                }
                $stmt->close();
            } else {
                error_log("Shoe Preparation Error: " . $conn->error);
                echo "Error preparing the shoe query.";
            }
>>>>>>> Stashed changes
=======
                echo "All fields are required for adding a shoe.";
                exit;
            }
        
            $baseDir = 'images';
            
            if (!is_dir($baseDir)) {
                mkdir($baseDir, 0755, true);
            }
        
            $folders = glob($baseDir . '\\Prod_*', GLOB_ONLYDIR);
            $nextFolderNumber = count($folders) + 1;
            $productFolder = $baseDir . "\\Prod_$nextFolderNumber";
        
            if (!mkdir($productFolder, 0755, true)) {
                echo "Failed to create folder for product images.";
                exit;
            }
        
            $imagePaths = [];
            if (isset($_FILES['images']) && $_FILES['images']['error'][0] === UPLOAD_ERR_OK) {
                $totalFiles = count($_FILES['images']['name']);
                
                if ($totalFiles != 4) {
                    echo "Please upload exactly 4 images.";
                    exit;
                }
        
                for ($i = 0; $i < $totalFiles; $i++) {
                    $fileTmpPath = $_FILES['images']['tmp_name'][$i];
                    $fileName = basename($_FILES['images']['name'][$i]);
                    $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
        
                    $allowedExtensions = ['jpg', 'jpeg', 'png'];
                    if (!in_array(strtolower($fileExtension), $allowedExtensions)) {
                        echo "Invalid file type for image " . ($i + 1) . ". Allowed types are: " . implode(", ", $allowedExtensions);
                        exit;
                    }
        
                    $newFileName = "image" . ($i + 1) . ".$fileExtension";
                    $fileDestination = $productFolder . "\\" . $newFileName;
        
                    if (move_uploaded_file($fileTmpPath, $fileDestination)) {
                        $imagePaths[] = $fileDestination;
                    } else {
                        echo "Failed to upload image" . ($i + 1);
                        exit;
                    }
                }
            } else {
                echo "No files uploaded or error uploading files.";
                exit;
            }
        
            $sql = "INSERT INTO shoes_table (
                shoe_name, shoe_brand, shoe_description, shoe_color, shoe_material, shoe_price, 
                shoe_gender, shoe_discount, shoe_date_added, image1, image2, image3, image4
            ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        
            $stmt = $conn->prepare($sql);
            if ($stmt) {
                $stmt->bind_param(
                    "sssssdissssss",
                    $shoe_name, $shoe_brand, $shoe_description, $shoe_color, $shoe_material, $shoe_price,
                    $shoe_gender, $shoe_discount, $shoe_date_added,
                    $imagePaths[0], $imagePaths[1], $imagePaths[2], $imagePaths[3]
                );
        
                if ($stmt->execute()) {
                    echo "Shoe added successfully!";
                } else {
                    error_log("Shoe Insert Error: " . $stmt->error);
                    echo "Failed to add shoe.";
                }
                $stmt->close();
            } else {
                error_log("Shoe Preparation Error: " . $conn->error);
                echo "Error preparing the shoe query.";
            }
>>>>>>> Stashed changes
        } elseif ($action === 'add_blog') {
            $blog_title = htmlspecialchars(trim($_POST['blog_title']));
            $blog_content = htmlspecialchars(trim($_POST['blog_content']));
            $blog_creation_date = htmlspecialchars(trim($_POST['blog_creation_date']));

            if (empty($blog_title) || empty($blog_content) || empty($blog_creation_date)) {
                echo "All fields are required for adding a blog.";
                exit;
            }

<<<<<<< Updated upstream
<<<<<<< Updated upstream
<<<<<<< Updated upstream
            $sql = "INSERT INTO `blogs-table` (blog_title, blog_content, blog_creation_date) VALUES (?, ?, ?)";
=======
            $sql = "INSERT INTO blogs_table (blog_title, blog_content, blog_creation_date) VALUES (?, ?, ?)";
>>>>>>> Stashed changes
=======
            $sql = "INSERT INTO blogs_table (blog_title, blog_content, blog_creation_date) VALUES (?, ?, ?)";
>>>>>>> Stashed changes
=======
            $sql = "INSERT INTO blogs_table (blog_title, blog_content, blog_creation_date) VALUES (?, ?, ?)";
>>>>>>> Stashed changes
            $stmt = $conn->prepare($sql);
            if ($stmt) {
                $stmt->bind_param("sss", $blog_title, $blog_content, $blog_creation_date);
                if ($stmt->execute()) {
                    echo "Blog added successfully!";
                } else {
                    error_log("Blog Insert Error: " . $stmt->error);
                    echo "Failed to add blog.";
                }
                $stmt->close();
            } else {
                error_log("Blog Preparation Error: " . $conn->error);
                echo "Error preparing the blog query.";
            }
<<<<<<< Updated upstream
<<<<<<< Updated upstream
<<<<<<< Updated upstream
=======
=======
>>>>>>> Stashed changes
=======
>>>>>>> Stashed changes
            
        } elseif ($action === 'delete_blog') {
            $blog_title = htmlspecialchars(trim($_POST['blog_title']));

            if (empty($blog_title)) {
                echo "Blog title is required to delete a blog.";
                exit;
            }

            $sql = "DELETE FROM blogs_table WHERE blog_title = ?";
            $stmt = $conn->prepare($sql);
            if ($stmt) {
                $stmt->bind_param("s", $blog_title);
                if ($stmt->execute()) {
                    if ($stmt->affected_rows > 0) {
                        echo "Blog deleted successfully.";
                    } else {
                        echo "No blog found with the specified title.";
                    }
                } else {
                    error_log("Blog Delete Error: " . $stmt->error);
                    echo "Failed to delete blog.";
                }
                $stmt->close();
            } else {
                error_log("Blog Preparation Error: " . $conn->error);
                echo "Error preparing the delete query.";
            }
<<<<<<< Updated upstream
<<<<<<< Updated upstream
>>>>>>> Stashed changes
=======
>>>>>>> Stashed changes
=======
>>>>>>> Stashed changes
        } else {
            echo "Invalid action.";
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
        function changeContent(content) {
            const mainPanel = document.getElementById('change_here');
            mainPanel.innerHTML = content;
        }

        document.getElementById('SHOES_BUTTON').addEventListener('click', function() {
            fetch('shoesOp.php')
                .then(response => response.text())
                .then(data => {
                    changeContent(data);
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
                    const dateInput = document.getElementById('date_added');
                    if (dateInput) {
                        dateInput.value = formattedDate;
                    }
                })
                .catch(error => console.error('Error:', error));
        });     


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
        function initFormScripts() {
            console.log("Initializing form scripts.");

            document.querySelectorAll('form').forEach(form => {
                form.addEventListener('submit', function(event) {
                    event.preventDefault();

                    const formData = new FormData(event.target);

                    fetch('blogsOp.php', {
                        method: 'POST',
                        body: formData,
                    })
                        .then(response => response.text())
                        .then(data => {
                            console.log("Form submission response:", data);
                            alert(data); // Display success or error message

                            // Refresh the blogs dropdown after deletion
                            fetch('blogsOp.php')
                                .then(response => response.text())
                                .then(updatedContent => {
                                    document.getElementById('change_here').innerHTML = updatedContent;
                                    initFormScripts(); // Reinitialize scripts for new content
                                })
                                .catch(error => console.error("Error refreshing blogs:", error));
                        })
                        .catch(error => console.error("Error:", error));
                });
            });
        }
    </script>
</body>
</html>