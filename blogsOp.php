<form class="blog-form" method="POST" action="">
    <input type="hidden" name="action" value="add_blog">
    <p>Shëno Titullin e Bllogut</p>
    <input class="blog-input" id="blogs_new_title" name="blog_title" placeholder="Titulli Shkon Këtu" required>

    <p>Shëno Bllogun</p>
    <textarea class="blog-textarea" id="blogs_new_content" name="blog_content" placeholder="Bllogu Shkon Këtu" required></textarea>

    <p>Shëno Ditën e Publikimit të Bllogut</p>
    <input class="blog-date" id="blogs_new_date" name="blog_creation_date" type="date" required>

    <button class="blog-button" type="submit" id="submit">Shto Artikullin</button>
</form>

<?php
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_blog'])) {
    $blog_title = htmlspecialchars(trim($_POST['blog_name']));

    if (empty($blog_title)) {
        die("Blog title is required for deletion.");
    }

    // Debug: Ensure the blog title is being received
    error_log("Attempting to delete blog: " . $blog_title);

    // Delete the selected blog
    $sql = "DELETE FROM `blogs_table` WHERE blog_title = ?";
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("s", $blog_title);
        if ($stmt->execute()) {
            echo "Blog deleted successfully!";
        } else {
            error_log("Blog Deletion Error: " . $stmt->error);
            echo "Failed to delete the blog.";
        }
        $stmt->close();
    } else {
        error_log("Blog Deletion Preparation Error: " . $conn->error);
        echo "Error preparing the deletion query.";
    }
    exit;
}

$sql = "SELECT blog_title FROM `blogs_table`";
$result = $conn->query($sql);
?>
<form class="blog-form" method="POST" action="">
    <input type="hidden" name="action" value="delete_blog">
    <p>Select the blog you want to delete:</p>
    <select name="blog_title" id="blog_title" required>
        <?php
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<option value=\"" . htmlspecialchars($row['blog_title']) . "\">" . htmlspecialchars($row['blog_title']) . "</option>";
            }
        } else {
            echo "<option value=\"\">No blogs available</option>";
        }
        ?>
    </select>
    <br>
    <button type="submit" name="delete_blog" class="delete-button">Delete Blog</button>
</form>