<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shoe-store";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$shoe_name = $description = $origin = $shoe_price = $discounted_price = ""; // Move variable initialization here
$sizes_options = $image_paths = [];

if (isset($_GET['shoe_id'])) {
    $shoe_id = $_GET['shoe_id'];

    // Prepare SQL query
    $sql = "SELECT s.shoe_name, sd.description, so.origin, sp.shoe_Price, sp.shoe_discounted_price, si.image_path
        FROM shoes s
        JOIN shoe_description sd ON s.shoe_id = sd.shoe_id
        JOIN shoe_origin so ON s.shoe_id = so.shoe_id
        JOIN shoe_prices sp ON s.shoe_id = sp.shoe_id
        JOIN shoe_images si ON s.shoe_id = si.shoe_id
        WHERE s.shoe_id = ?";

    // Prepare statement
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        die("Error in preparing statement: " . $conn->error);
    }

    // Bind parameters (shoe ID as string)
    $stmt->bind_param("s", $shoe_id);

    // Execute statement
    $stmt->execute();

    // Get result
    $result = $stmt->get_result();

    // Fetch data
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $shoe_name = $row["shoe_name"];
        $description = $row["description"];
        $origin = $row["origin"];
        $shoe_price = $row["shoe_Price"];
        $discounted_price = $row["shoe_discounted_price"];
    } else {
        echo "0 results";
    }

    // Close the statement
    $stmt->close();

    // Prepare SQL query for shoe sizes
    $sql = "SELECT size_id, stock FROM shoe_sizes WHERE shoe_id = ? AND stock > 0";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $shoe_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $size_id = $row["size_id"];
            $stock = $row["stock"];
            $sizes_options[] = "<option value='$size_id'>$size_id ($stock në stok)</option>";
        }
    } else {
        $sizes_options[] = "<option style='color: black;' value='' disabled>No sizes available</option>";
    }

    // Close the statement
    $stmt->close();

    // Prepare SQL query for shoe images
    $sql = "SELECT image_path FROM shoe_images WHERE shoe_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $shoe_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $image_paths[] = $row["image_path"];
        }
    } else {
        echo "0 results";
    }

    // Close the statement
    $stmt->close();
}

// Close the connection
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="duas_logo.svg" />
    <title>Dua's - Bëni Porosinë</title>
    <!-- Desktop stylesheet -->
    <link rel="stylesheet" href="zoomed_product_css.css" media="screen and (min-width: 601px)">

    <!-- Mobile stylesheet -->
    <link rel="stylesheet" href="zoomed_product_css_mobile.css" media="screen and (max-width: 600px)">
</head>

<body style="background-color: #EBE2E0;">
    <div class="popup">
        <div class="top-section">

            <?php
            $limit = min(4, count($image_paths)); // Limit the loop to iterate only four times or the number of images available, whichever is smaller
            for ($counter = 0; $counter < $limit; $counter++) {
                $path = $image_paths[$counter];
                echo "<button id='photoButton" . ($counter + 1) . "'><img src='$path' alt='Small Image " . ($counter + 1) . "'></button>";
            }
            ?>
        </div>
        <div class="content-section">
            <div class="left-section">
                <?php
                if (!empty($image_paths)) {
                    echo "<img src='" . $image_paths[0] . "' alt='Large Image'>";
                } else {
                    echo "<p>No image available</p>";
                }
                ?>

                <form action="send_email.php" method="post">
            </div>
            <div class="right-section">
                <div class="product-info">
                    <h2 style="text-align: center;"><?php echo $shoe_name; ?></h2>
                    <?php if ($discounted_price != 0.00) : ?>
                        <p id="price" class="price">€<?php echo $discounted_price; ?> <span id="red_price" class="old-price">€<?php echo $shoe_price; ?></span></p>
                    <?php else: ?>
                        <p id="price" class="price">€<?php echo $shoe_price; ?></p>
                    <?php endif; ?>
                    <p class="description"><?php echo nl2br($description); ?></p>

                    <p style="margin-right: 50px ;font-size: 14px;text-align: right; color: gray;">Shteti i Origjinës:
                        <?php echo $origin; ?></p>
                </div>
                <input type="hidden" name="shoe_name" value="<?php echo $shoe_name; ?>">
                <input type="hidden" name="shoe_id" value="<?php echo $shoe_id; ?>">
                <select class="select-style" required name="size">
                    <option style="color: black;" value="" selected disabled hidden>Zgjidhni Madhësinë e Këpucëve</option>
                    <option style="color: black;" value="" disabled>Opsionet e paqasshme nuk janë në stok!</option>
                    <?php echo implode("", $sizes_options); ?>
                </select>
                <br>
                <p class="cascade">Email: <input required type="email" class="bottom-inputs" name="email"
                        placeholder="Email-adresa e juaj"></p><br>
                <p class="cascade">Emri i Plotë: <input required type="text" class="bottom-inputs" name="name"
                        placeholder="Emri dhe mbiemri e juaj"></p><br>
                <p class="cascade">Numri i Telefonit: <input required type="tel" class="bottom-inputs" name="phone"
                        placeholder="Numri i juaj i telefonit"></p><br>
                <p style="width: auto;" class="cascade">Adresa Postare: <input required type="text" class="adresa-input" name="address"
                        placeholder="Adresa ku do të shkoj porosia"></p><br>
                <p style="font-size: 13px; color: gray; text-align: right; margin-right: 50px; margin-top: -15px; margin-bottom: 5px">*Posta brenda Kosovës është falas.</p>
                <!-- Captcha 
            <div class="captcha-placeholder">
                Captcha goes here
                CAPTCHA
            </div>
            Order Button -->

                <button class="orderButton" id="orderNowButton" name="sendEmail" type="submit">Porosit</button>
                </form>
            </div>
        </div>
    </div>
    <div id="order_popupOverlay" class="order_overlay">
        <div class="order_popup">
            <h2>Porosia u bë me sukses!</h2>
            <p>Porosia u përfundua me sukses dhe është dërguar në databazën tonë.</p>
            <p>Ju falenderojmë që na zgjodhët shërbimet tona!</p>
            <button id="closePopup">Mbyll</button>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var targetImage = document.querySelector('.left-section img');

            document.getElementById('photoButton1').addEventListener('click', function() {
                changeImageSource(this);
            });

            document.getElementById('photoButton2').addEventListener('click', function() {
                changeImageSource(this);
            });

            document.getElementById('photoButton3').addEventListener('click', function() {
                changeImageSource(this);
            });

            document.getElementById('photoButton4').addEventListener('click', function() {
                changeImageSource(this);
            });


            function changeImageSource(button) {

                var imgInsideButton = button.querySelector('img');


                if (imgInsideButton) {
                    targetImage.src = imgInsideButton.src;
                }
            }
        });
    </script>
    <script>
        document.getElementById("orderNowButton").addEventListener("click", function() {

            document.getElementById("order_popupOverlay").style.display = "block";
        });

        document.getElementById("closePopup").addEventListener("click", function() {

            document.getElementById("order_popupOverlay").style.display = "none";
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            function handleOrientationChange() {
                var isPortrait = window.matchMedia("(orientation: portrait)").matches;
                if (isPortrait) {
                    document.getElementById('rotate-device').style.display = 'block';
                    document.querySelector('.main_div').style.display = 'none'; // Hide main content
                    // Hide other elements as necessary
                } else {
                    document.getElementById('rotate-device').style.display = 'none';
                    document.querySelector('.main_div').style.display = 'block'; // Show main content
                    // Show other elements as necessary
                }
            }

            // Listen for orientation changes and handle them
            window.addEventListener('orientationchange', handleOrientationChange);

            // Call the function to set the initial state
            handleOrientationChange();
        });
    </script>
</body>

</html>