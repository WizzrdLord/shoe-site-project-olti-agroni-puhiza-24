<div class="main-container">
    <div class="left-column">
        <!--Add Shoe-->
        <form method="POST" action="" class="shoe-form" enctype="multipart/form-data">
            <input type="hidden" name="action" value="add_shoe">

            <!--Name & Brand Input-->
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

            <!--Description-->
            <div class="form-group">
                <label for="description">Shoe Description</label>
                <textarea id="description" name="shoe_description" placeholder="Shoe Description" required></textarea>
            </div>

            <!--Image Upload-->
            <div class="form-group">
                <label for="images">Upload 4 Images (800x800px)</label>
                <input type="file" name="images[]" id="images" accept="image/*" multiple required>
            </div>

            <!--Color & Material Input-->
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
            
            <!--Price & Gender Input-->
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
            
            <!--Discount-->
            <div class="form-group">
                <label for="discount">Discount: <span id="discount_value">0</span>%</label>
                <input type="range" value="0.00" step="5.00" id="discount" name="shoe_discount" min="0" max="100" required>
            </div>
            
            <!--Date-->
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
                    // Check for shoes in db
                    if ($result && $result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            // Output each shoe name in options
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
        <div class="shoe-viewer">
            <h2>Available Shoes</h2>
            <div class="shoe-grid">
                <?php
                $sql = "SELECT shoes.id, shoes.name, shoes.brand, shoes.description, shoes.image_path, colors.color_name, colors.id AS color_id, materials.material_name, materials.id AS material_id, shoes.price, shoes.discount, shoes.gender, shoes.date_added
                        FROM shoes 
                        JOIN colors ON shoes.color_id = colors.id 
                        JOIN materials ON shoes.material_id = materials.id";
        
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
                        $colorId = $row['color_id']; // Storing color ID for numeric values
                        $materialId = $row['material_id']; // Storing material ID for numeric values
                    
                        $fullImagePath = "images/$imagePath";
                        if (!file_exists($fullImagePath)) {
                            $fullImagePath = "images/default.png";
                        }
                ?>
                <div class="shoe-card">
                    <div class="shoe-info">
                        <!--Image-->
                        <img src="<?= $fullImagePath ?>" alt="<?= $name ?>" class="shoe-image">
                        
                        <!--Name & Brand Edit-->
                        <div class="shoe-name-brand">
                            <h3 class="shoe-name" contenteditable="true" data-field="name" data-id="<?= $id ?>">
                                <?= $name ?>
                            </h3>
                            <label for="brand-<?= $id ?>">Brand:</label>
                            <p id="brand-<?= $id ?>" class="shoe-brand" contenteditable="true" data-field="brand" data-id="<?= $id ?>">
                                <?= $brand ?>
                            </p>
                        </div>
                        
                        <!--Description Edit-->
                        <p class="shoe-description" contenteditable="true" data-field="description" data-id="<?= $id ?>" data-description="<?= htmlspecialchars($description, ENT_QUOTES) ?>">
                            <span class="short-description">
                                <?= htmlspecialchars_decode(substr($description, 0, 100)) ?>...
                            </span>
                            
                            <span class="full-description" style="display: none;">
                                <?= htmlspecialchars_decode($description) ?>
                            </span>
                            <span class="read-more" data-id="<?= $id ?>" data-expanded="false">Read More</span>
                        </p>

                        <!--Color & Material Edit-->
                        <div class="shoe-color-material">
                            <label for="color-<?= $id ?>">Color:</label>
                            <select id="color-<?= $id ?>" class="shoe-color" data-field="color_id" data-id="<?= $id ?>" name="color_id">
                                <option value="1" <?= ($colorId == 1) ? 'selected' : '' ?>>Red</option>
                                <option value="2" <?= ($colorId == 2) ? 'selected' : '' ?>>Yellow</option>
                                <option value="3" <?= ($colorId == 3) ? 'selected' : '' ?>>Orange</option>
                                <option value="4" <?= ($colorId == 4) ? 'selected' : '' ?>>Green</option>
                                <option value="5" <?= ($colorId == 5) ? 'selected' : '' ?>>Blue</option>
                                <option value="6" <?= ($colorId == 6) ? 'selected' : '' ?>>Purple</option>
                                <option value="7" <?= ($colorId == 7) ? 'selected' : '' ?>>Gold</option>
                                <option value="8" <?= ($colorId == 8) ? 'selected' : '' ?>>Silver</option>
                                <option value="9" <?= ($colorId == 9) ? 'selected' : '' ?>>Gray</option>
                                <option value="10" <?= ($colorId == 10) ? 'selected' : '' ?>>Beige</option>
                                <option value="11" <?= ($colorId == 11) ? 'selected' : '' ?>>Brown</option>
                                <option value="12" <?= ($colorId == 12) ? 'selected' : '' ?>>Black</option>
                                <option value="13" <?= ($colorId == 13) ? 'selected' : '' ?>>White</option>
                            </select>
                    
                            <label for="material-<?= $id ?>">Material:</label>
                            <select id="material-<?= $id ?>" class="shoe-material" data-field="material_id" data-id="<?= $id ?>" name="material_id">
                                <option value="1" <?= ($materialId == 1) ? 'selected' : '' ?>>Cotton</option>
                                <option value="2" <?= ($materialId == 2) ? 'selected' : '' ?>>Canvas</option>
                                <option value="3" <?= ($materialId == 3) ? 'selected' : '' ?>>Leather</option>
                                <option value="4" <?= ($materialId == 4) ? 'selected' : '' ?>>Sued</option>
                                <option value="5" <?= ($materialId == 5) ? 'selected' : '' ?>>Mesh</option>
                                <option value="6" <?= ($materialId == 6) ? 'selected' : '' ?>>Nylon</option>
                                <option value="7" <?= ($materialId == 7) ? 'selected' : '' ?>>Synthetic</option>
                                <option value="8" <?= ($materialId == 8) ? 'selected' : '' ?>>Rubber</option>
                            </select>
                        </div>

                        <!--Price & Discount Edit-->
                        <div class="shoe-price-discount">
                            <label for="price-<?= $id ?>">Price:</label>
                            <p id="price-<?= $id ?>" class="shoe-price" contenteditable="true" data-field="price" data-id="<?= $id ?>">
                                <?= $price ?>
                            </p>
                            <label for="discount-<?= $id ?>">Discount:</label>
                            <p id="discount-<?= $id ?>" class="shoe-discount" contenteditable="true" data-field="discount" data-id="<?= $id ?>">
                                <?= $discount ?>
                            </p>
                        </div>

                        <!--Gender Edit-->
                        <p class="shoe-gender" contenteditable="true" data-field="gender" data-id="<?= $id ?>">
                            <?= $gender ?>
                        </p>
                        
                        <!--Date-->
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
