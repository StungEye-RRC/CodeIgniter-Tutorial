<h2><?= $title ?></h2>


<?= validation_errors('<div class="alert alert-danger">', '</div>') ?>

<?= form_open('blogs/create') ?>
    <label for="title">Title</label>
    <input class="form-control" type="input" name="title" value="<?= $blog['title'] ?>" /><br />

    <label for="content">Content</label>
    <textarea class="form-control" name="content"><?= $blog['content'] ?></textarea><br />

    <input type="submit" name="submit"  class="btn btn-primary" value="Create news item" />
</form>
