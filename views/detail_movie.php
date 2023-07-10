<!-- detail_movie.php -->

<?php /* @var Movie $movie */ ?>
<?php require "header.php"; ?>

<style>
    .container {
        background-color: #f5f5f5;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    h2 {
        margin-bottom: 20px;
    }

    .movie-info {
        margin-bottom: 10px;
    }

    .movie-info strong {
        display: inline-block;
        width: 120px;
        font-weight: bold;
    }

    .btn-back {
        margin-top: 20px;
    }
</style>

<h2>Movie Details</h2>
<div>
    <strong>Title:</strong> <?php echo $movie['title']; ?>
</div>
<div>
    <strong>Movie Duration:</strong> <?php echo $movie['time']; ?>
</div>
<div>
    <strong>Movie Genre:</strong> <?php echo $movie['type']; ?>
</div>

<a class="btn btn-default" href="/index.php?page=show">Back to Movie List</a>


<?php require "footer.php"; ?>
