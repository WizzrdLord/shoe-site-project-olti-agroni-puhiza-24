<div class="main-container">
    <div class="left-column">
        <!--Add Shoe-->
        <form method="POST" action="" class="shoe-form" enctype="multipart/form-data">
            <input type="hidden" name="action" value="add_shoe">
            <div class="form-row">
                <div class="form-group">
                    <label for="name">Shoe Name</label>
                    <input id="name" name="shoe_name" placeholder="Shoe Name" required>
                </div>

                <div class="form-group">
                    <label for="brand">Shoe Brand</label>
                    <input id="brand" name="shoe_brand" placeholder="Shoe Brand" required>
                </div>
            </div>

            <div class="form-group">
                <label for="description">Shoe Description</label>
                <textarea id="description" name="shoe_description" placeholder="Shoe Description" required></textarea>
            </div>

            <div class="form-group">
                <label for="images">Upload 4 Images (800x800px)</label>
                <input type="file" name="images[]" id="images" accept="image/*" multiple required>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="color">Color</label>
                    <input id="color" name="shoe_color" list="Colors" placeholder="Color" required>
                    <datalist id="Colors">
                        <option data-value="1">Red</option>
                        <option data-value="2">Yellow</option>
                        <option data-value="3">Orange</option>
                        <option data-value="4">Green</option>
                        <option data-value="5">Blue</option>
                        <option data-value="6">Purple</option>
                        <option data-value="7">Gold</option>
                        <option data-value="8">Silver</option>
                        <option data-value="9">Gray</option>
                        <option data-value="10">Beige</option>
                        <option data-value="11">Brown</option>
                        <option data-value="12">Black</option>
                        <option data-value="13">White</option>
                    </datalist>
                    <input type="hidden" id="color_value" name="shoe_color" required>
                </div>

                <div class="form-group">
                    <label for="material">Material</label>
                    <input id="material" name="shoe_material" list="Materials" placeholder="Material" required>
                    <datalist id="Materials">
                        <option data-value="1">Cotton</option>
                        <option data-value="2">Canvas</option>
                        <option data-value="3">Leather</option>
                        <option data-value="4">Sued</option>
                        <option data-value="5">Mesh</option>
                        <option data-value="6">Nylon</option>
                        <option data-value="7">Synthetic</option>
                        <option data-value="8">Rubber</option>
                    </datalist>
                    <input type="hidden" id="material_value" name="shoe_material" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="price">Price</label>
                    <input id="price" name="shoe_price" placeholder="0$" required>
                </div>

                <div class="form-group">
                    <label for="gender">Gender</label>
                    <input id="gender" name="shoe_gender" placeholder="🚁">
                </div>
            </div>

            <div class="form-group">
                <label for="discount">Discount: <span id="discount_value">0</span>%</label>
                <input type="range" value="0.00" step="5.00" id="discount" name="shoe_discount" min="0" max="100" required>
            </div>

            <div class="form-group">
                <label for="date_added">Date</label>
                <input id="date_added" name="shoe_date_added" type="date" required>
            </div>
            <button type="submit" class="add_shoe">Add Shoe</button>
        </form>
        <!--Delete Shoe-->
        <?php
            require 'config.php';

            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_shoe'])) {
                $shoe_name = htmlspecialchars(trim($_POST['name']));
            
                if (empty($shoe_name)) {
                    die("Shoe name is required for deletion.");
                }
                error_log("Attempting to delete shoe: " . $shoe_name);
            
                $sql = "DELETE FROM `shoes` WHERE `name` = ?";
                $stmt = $conn->prepare($sql);
                if ($stmt) {
                    $stmt->bind_param("s", $shoe_name);
                    if ($stmt->execute()) {
                        echo "Shoe deleted successfully!";
                    } else {
                        error_log("Shoe Deletion Error: " . $stmt->error);
                        echo "Failed to delete shoe.";
                    }
                    $stmt->close();
                } else {
                    error_log("Shoe Deletion Preparation Error: " . $conn->error);
                    echo "Error preparing the deletion query.";
                }
                exit;
            }

            $sql = "SELECT `name` FROM shoes";
            $result = $conn->query($sql);
        ?> 
        <form class="shoe-form" method="POST" action="">
            <input type="hidden" name="action" value="delete_shoe">
            <p class="form-title">Select the shoe you want to delete:</p>
            <div class="form-group">
                <select name="name" id="name" required class="form-control">
                    <?php
                    if ($result && $result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value=\"" . htmlspecialchars($row['name']) . "\">" . htmlspecialchars($row['name']) . "</option>";
                        }
                    } else {
                        echo "<option value=\"\">No shoes available</option>";
                    }
                    ?>
                </select>
            </div>
            <button type="submit" name="delete_shoe" class="delete-shoe">Delete Shoe</button>
        </form>
    </div>

    <div class="right-column">
        <!--View Shoes & Edit-->
        <?php
        $sql = "SELECT shoes.id, shoes.name, shoes.brand, shoes.description, shoes.image_path, colors.color_name, materials.material_name, shoes.price, shoes.discount, shoes.gender, shoes.date_added
        FROM shoes JOIN colors ON shoes.color_id = colors.id JOIN materials ON shoes.material_id = materials.id";

        $result = $conn->query($sql);
?>
        <div class="shoe-viewer">
            <h2>Available Shoes</h2>
            <div class="shoe-grid">
                <?php
                $sql = " SELECT
                        shoes.id,
                        shoes.name,
                        shoes.brand,
                        shoes.description,
                        colors.color_name,
                        materials.material_name,
                        shoes.price,
                        shoes.discount,
                        shoes.gender,
                        shoes.date_added,
                        shoes.image_path
                    FROM
                        shoes
                    LEFT JOIN
                        colors ON shoes.color_id = colors.id
                    LEFT JOIN
                        materials ON shoes.material_id = materials.id
                ";
                $result = $conn->query($sql);

                if ($result && $result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $id = htmlspecialchars($row['id']);
                        $name = htmlspecialchars($row['name']);
                        $brand = htmlspecialchars($row['brand']);
                        $description = htmlspecialchars($row['description']);
                        $imagePath = htmlspecialchars($row['image_path']);
                        $colorName = htmlspecialchars($row['color_name']);
                        $materialName = htmlspecialchars($row['material_name']);
                        $price = htmlspecialchars($row['price']);
                        $discount = htmlspecialchars($row['discount']);
                        $gender = htmlspecialchars($row['gender']);
                        $dateAdded = htmlspecialchars($row['date_added']);
                    
                        $fullImagePath = "images/$imagePath";
                    
                        if (!file_exists($fullImagePath)) {
                            $fullImagePath = "images/default.png";
                        }
                        ?>
                        <div class="shoe-card">
                            <div class="shoe-info">
                                <img src="<?= $fullImagePath ?>" alt="<?= $name ?>" class="shoe-image">
                                <div class="shoe-name-brand">
                                    <h3 class="shoe-name" contenteditable="true" data-field="name" data-id="<?= $id ?>">
                                        <?= $name ?>
                                    </h3>
                                    <p class="shoe-brand" contenteditable="true" data-field="brand" data-id="<?= $id ?>">
                                        Brand: <?= $brand ?>
                                    </p>
                                </div>
                    
                                <p class="shoe-description">
                                    <?= substr($description, 0, 100) ?>...
                                    <span class="read-more" data-id="<?= $id ?>">Read More</span>
                                </p>
                    
                                <div class="shoe-color-material">
                                    <p class="shoe-color" contenteditable="true" data-field="color" data-id="<?= $id ?>">
                                        Color: <?= $colorName ?>
                                    </p>
                                    <p class="shoe-material" contenteditable="true" data-field="material" data-id="<?= $id ?>">
                                        Material: <?= $materialName ?>
                                    </p>
                                </div>

                                <div class="shoe-price-discount">
                                    <p class="shoe-price" contenteditable="true" data-field="price" data-id="<?= $id ?>">
                                        Price: $<?= $price ?>
                                    </p>
                                    <p class="shoe-discount" contenteditable="true" data-field="discount" data-id="<?= $id ?>">
                                        Discount: <?= $discount ?>%
                                    </p>
                                </div>
                    
                                <p class="shoe-gender" contenteditable="true" data-field="gender" data-id="<?= $id ?>">
                                    Gender: <?= $gender ?>
                                </p>
                    
                                <p class="shoe-date">
                                    Added On: <?= $dateAdded ?>
                                </p>
                                <button class="save-button" name="update_shoe" data-id="<?= $id ?>">Save Changes</button>
                            </div>
                        </div>
                        <?php
                    }
                } else {
                    echo "<p>No shoes available to display.</p>";
                }
                
                ?>
            </div>
        </div>
    </div>
</div>
