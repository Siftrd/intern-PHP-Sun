<?php
/* @var Controller $this */
require "header.php";
?>
<div class="row">
    <div class="col-lg-6 col-sm-12">
      <?php $this->success() ?>
      <?php $this->updateSuccess() ?>
    <h2>Movie List</h2>
    <table class="table-striped">
        <tr>
            <th>Title</th>
            <th>Movie duration</th>
            <th>Movie Genre</th>
            <th>Update</th>
            <th>Delete</th>
            <th>Info</th>
        </tr>
        <?php
        foreach ($this->db->readAll('movie') as $value):
        ?>
            <tr>
                <td><?php echo $value['title']; ?></td>
                <td><?php echo $value['time']; ?></td>
                <td><?php echo $value['type'];?></td>
                <td>
                    <a class="btn btn-default" href="/index.php?page=update_movie&id=<?php echo $value['id']; ?>">Update</a>
                </td>
                <td>
                    <a class="btn btn-default" href="/index.php?page=delete_movie&id=<?php echo $value['id']; ?>">Delete</a>
                </td>
                <td>
                    <a class="btn btn-default" href="/index.php?page=detail_movie&id=<?php echo $value['id']; ?>">Info</a>
                </td>
            </tr>
        <?php endforeach; ?>

    </table>
    </div>
</div>

<?php
require "footer.php";
?>