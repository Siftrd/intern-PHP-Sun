<?php
require "header.php";
?>

<form action="/index.php?page=create_movie" method="post">
    <div class="form-group">
        <label for="name">Tile: </label>
        <input type="text" name="title" class="form-control" id="name" placeholder="Title" required>
    </div>
    <div class="form-group">
        <label for="time">Movie duration: </label>
        <input type="text" name="time" class="form-control" id="time" placeholder="Movie duration" required>
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

<?php
require "footer.php";
?>
