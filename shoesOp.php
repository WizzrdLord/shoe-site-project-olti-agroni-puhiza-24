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
                <option data-value="2">Green</option>
                <option data-value="3">Blue</option>
                <option data-value="4">Yellow</option>
                <option data-value="5">Purple</option>
                <option data-value="6">Orange</option>
                <option data-value="7">Black</option>
                <option data-value="8">White</option>
                <option data-value="9">Gold</option>
                <option data-value="10">Silver</option>
                <option data-value="11">Gray</option>
                <option data-value="12">Beige</option>
                <option data-value="13">Brown</option>
            </datalist>
            <input type="hidden" id="color_value" name="shoe_color" required>
        </div>

        <div class="form-group">
            <label for="material">Material</label>
            <input id="material" name="shoe_material" list="Materials" placeholder="Material" required>
            <datalist id="Materials">
                <option data-value="1">Canvas</option>
                <option data-value="2">Cotton</option>
                <option data-value="3">Leather</option>
                <option data-value="4">Mesh</option>
                <option data-value="5">Nylon</option>
                <option data-value="6">Rubber</option>
                <option data-value="7">Sued</option>
                <option data-value="8">Synthetic</option>
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

    <script>
      document.addEventListener('DOMContentLoaded', function () {
        // JS Discount RT Display
        function updateDiscountDisplay() {
            const discountInput = document.getElementById('discount');
            const discountValue = document.getElementById('discount_value');

            if (discountInput) {
                discountInput.addEventListener('input', function () {
                    discountValue.textContent = discountInput.value;
                });
            }
        }
        // JS Color Display Replacement
        const c_input = document.getElementById('color');
        const c_datalist = document.getElementById('Colors');
        const c_hiddenInput = document.getElementById('color_value');

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
        // JS Material Display Replacement
        const m_input = document.getElementById('material');
        const m_datalist = document.getElementById('Materials');
        const m_hiddenInput = document.getElementById('material_value');

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
        // JS Auto Date
        const today = new Date();
        const yyyy = today.getFullYear();
        const mm = String(today.getMonth() + 1).padStart(2, '0');
        const dd = String(today.getDate()).padStart(2, '0');
        const formattedDate = `${yyyy}-${mm}-${dd}`;

        // Set the value of the input to today's date
        const dateInput = document.getElementById('date_added');
        dateInput.value = formattedDate;
      });
    </script>

    <button type="submit" class="add_shoe">Add Shoe</button>
</form>

<?php
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_shoe'])) {
    $shoe_name = htmlspecialchars(trim($_POST['name']));

    if (empty($shoe_name)) {
        die("Shoe name is required for deletion.");
    }
    // Debug: Ensure the blog title is being received
    error_log("Attempting to delete shoe: " . $shoe_name);

    // Delete the selected blog
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
        <select name="shoe_name" id="name" required class="form-control">
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