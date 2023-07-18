<?php
/* @var Controller $this */
require "header.php";
?>
<div class="row">
    <div class="col-lg-6 col-sm-12">
        <?php $this->success() ?>
        <?php $this->updateSuccess() ?>
        <?php $this->deleteSuccess() ?>

        <h2 class="txt-title">Movie List</h2>
        <btn><a class="nav-color btn btn-add" href="../index.php?page=create_movie">Add Movie</a></btn>

        <table class="table-striped">
            <tr>
                <th class="txt-color">Title</th>
                <th class="txt-color">Movie duration</th>
                <th class="txt-color">Movie Genre</th>
                <th class="txt-color">Update</th>
                <th class="txt-color">Delete</th>
                <th class="txt-color">Info</th>
            </tr>
            <?php
            foreach ($this->db->readAll('movie') as $value):
            ?>
                <tr>
                    <td class="txt-color"><?php echo $value['title']; ?></td>
                    <td class="txt-color"><?php echo $value['time']; ?></td>
                    <td class="txt-color"><?php echo $value['type']; ?></td>
                    <td class="txt-color">
                        <a class="btn btn-update " href="/index.php?page=update_movie&id=<?php echo $value['id']; ?>">Update</a>
                    </td>
                    <td>
                        <a class="btn btn-delete" onclick="confirmDelete(<?php echo $value['id']; ?>)">Delete</a>
                    </td>
                    <td>
                        <a class="btn btn-info" href="/index.php?page=detail_movie&id=<?php echo $value['id']; ?>">View</a>
                    </td>
                </tr>
            <?php endforeach; ?>

        </table>
    </div>
</div>

<script type="text/javascript">
    function confirmDelete(id) {
        if (confirm("Are you sure you want to delete this movie?")) {
            window.location.href = "/index.php?page=do_delete_movie&id=" + id;
        } else {
            window.location.href = "/index.php?page=show";
        }
    }
</script>

<?php
require "footer.php";
?>
