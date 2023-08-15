<?php
/* @var movie $movie */
require "header.php";
?>

<form action="/index.php?page=do_update_movie" method="post">
    <div class="form-group">
        <input type="hidden" name="id" class="form-control" id="id" value="<?php echo $movie['id']; ?>" readonly>
    </div>
    <div class="form-group">
        <label for="name">Title: </label>
        <input type="text" name="title" class="form-control" id="name" value="<?php echo $movie['title']; ?>" required>
        <div id="titleError" class="error-message"></div>
    </div>
    <div class="form-group">
        <label for="time">Movie duration: </label>
        <input type="text" name="time" class="form-control" id="time" value="<?php echo $movie['time']; ?>" required>
        <div id="timeError" class="error-message"></div>
    </div>
    <div class="form-group">
        <label for="genre">Movie Genre:</label>
        <select name="type" class="form-control" id="genre" required>
            <option value=""></option>
            <option value="Action" <?php if ($movie['type'] === 'Action') echo 'selected'; ?>>Action</option>
            <option value="Adventure" <?php if ($movie['type'] === 'Adventure') echo 'selected'; ?>>Adventure</option>
            <option value="Comedy" <?php if ($movie['type'] === 'Comedy') echo 'selected'; ?>>Comedy</option>
            <option value="Drama" <?php if ($movie['type'] === 'Drama') echo 'selected'; ?>>Drama</option>
            <option value="Horror" <?php if ($movie['type'] === 'Horror') echo 'selected'; ?>>Horror</option>
            <option value="Romance" <?php if ($movie['type'] === 'Romance') echo 'selected'; ?>>Romance</option>
            <option value="Sci-Fi" <?php if ($movie['type'] === 'Sci-Fi') echo 'selected'; ?>>Sci-Fi</option>
            <!-- Thêm các thể loại phim khác vào đây -->
        </select>
    </div>

    <button type="submit" class="btn btn-update" name="update_movie" id="update_movie">Update movie</button>
</form>

<script type="text/javascript">
    function validateForm() {
        var title = document.getElementById("name").value;
        var time = document.getElementById("time").value;

        // Remove previous error messages
        document.getElementById("titleError").innerHTML = "";
        document.getElementById("timeError").innerHTML = "";

        // Validate title
        if (title.length < 3 || title.length > 100) {
            document.getElementById("titleError").innerHTML = "Title must be between 3 and 100 characters.";
            return false;
        }

        // Validate time
        if (time.length < 3 || time.length > 100) {
            document.getElementById("timeError").innerHTML = "Movie duration must be between 3 and 100 characters.";
            return false;
        }

        // Prevent executing script tags
        var regex = /<script\b[^<]*(?:(?!<\/script>)<[^<]*)*<\/script>/gi;
        if (regex.test(title) || regex.test(time)) {
            alert("Invalid input. Script tags are not allowed.");
            return false;
        }

        return true;
    }
</script>

<?php
require "footer.php";
?>