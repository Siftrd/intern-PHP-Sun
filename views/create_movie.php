<?php
require "header.php";
?>

<form action="/index.php?page=create_movie" method="post" onsubmit="return validateForm()">
    <div class="form-group">
        <label for="name">Title: </label>
        <input type="text" name="title" class="form-control" id="name" placeholder="Title" required>
        <div id="titleError" class="error-message"></div>
    </div>
    <div class="form-group">
        <label for="time">Movie duration: </label>
        <input type="text" name="time" class="form-control" id="time" placeholder="Movie duration" required>
        <div id="timeError" class="error-message"></div>
    </div>
    <div class="form-group">
        <label for="genre">Movie Genre:</label>
        <select name="type" class="form-control" id="genre" required>
            <option value="">Select a genre</option>
            <option value="Action">Action</option>
            <option value="Adventure">Adventure</option>
            <option value="Comedy">Comedy</option>
            <option value="Drama">Drama</option>
            <option value="Horror">Horror</option>
            <option value="Romance">Romance</option>
            <option value="Sci-Fi">Sci-Fi</option>
        </select>
    </div>

    <button type="submit" class="btn btn-add" name="insert_movie" id="insert_movie">Add new movie</button>
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
