<?php
require "header.php";
?>

<form action="/index.php?page=create_movie" method="post">
    <div class="form-group">
        <label for="name">Tile: </label>
        <input type="text" name="title" class="form-control" id="name" placeholder="Name" required>
    </div>
    <div class="form-group">
        <label for="time">Movie duration: </label>
        <input type="text" name="time" class="form-control" id="time" placeholder="Birthyear" required>
    </div>
    <div class="form-group">
        <label for="nationality">Movie Genre: </label>
        <input type="text" name="type" class="form-control" id="nationality" placeholder="Nationality" required>
    </div>
    <button type="submit" class="btn btn-default" name="insert_movie" id="insert_movie">Insert new movie</button>
</form>

<?php
require "footer.php";
?>
