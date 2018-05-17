<h3><?= html_escape($blog['title']) ?></h3>
<div>
  <?= html_escape($blog['content']) ?>
</div>

<?= form_open("blogs/{$blog['id']}/delete") ?>
  <?= form_submit('delete', 'Delete'); ?>
</form>
