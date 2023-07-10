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
    </div>
    <div class="form-group">
        <label for="time">Movie duration: </label>
        <input type="text" name="time" class="form-control" id="time" value="<?php echo $movie['time']; ?>" required>
    </div>
    <div class="form-group">
        <label for="nationality">Movie Genre: </label>
        <input type="text" name="type" class="form-control" id="nationality" value="<?php echo $movie['type']; ?>" required>
    </div>
    <button type="submit" class="btn btn-default" name="update_movie" id="update_movie">Update movie</button>
</form>

<?php
require "footer.php";
?>
