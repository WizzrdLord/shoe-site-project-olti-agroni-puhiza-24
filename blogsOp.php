<form class="blog-form" method="POST" action="">
    <p>Shëno Titullin e Bllogut</p>
    <input class="blog-input" id="blogs_new_title" name="blog_title" placeholder="Titulli Shkon Këtu" required>

    <p>Shëno Bllogun</p>
    <textarea class="blog-textarea" id="blogs_new_content" name="blog_content" placeholder="Bllogu Shkon Këtu" required></textarea>

    <p>Shëno Ditën e Publikimit të Bllogut</p>
    <input class="blog-date" id="blogs_new_date" name="blog_creation_date" type="date" required>

    <button class="blog-button" type="submit" id="submit">Shto Artikullin</button>
</form>

<form class="blog-form" method="POST" action="">
    <p>Zgjidhni artikullin te cilin doni te fshini.</p>
    <br>
    <select name="blog_name" id="blog_name" required>
        <?php
        $sql = "SELECT blog_title FROM `blogs-table`";
        $result = $conn->query($sql);

        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<option value=\"" . htmlspecialchars($row['blog_title']) . "\">" . htmlspecialchars($row['blog_title']) . "</option>";
            }
        } else {
            echo "<option value=\"\">No blogs available</option>";
        }
        ?>
        <button type="submit" class="delete-button">Delete Blog</button>
    </select>
</form>