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
    <label for="genre">Movie Genre:</label>
    <select name="type" class="form-control" id="genre" required>
        <option value="<?php echo $movie['time']; ?>"></option>
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

<?php
require "footer.php";
?>
