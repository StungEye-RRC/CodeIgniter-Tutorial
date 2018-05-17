<h2><?= $title ?></h2>

<div>
  <a class="btn btn-primary" href="<?= site_url('blogs/new') ?>">New Blog Post</a>
</div>


<?php foreach($blogs as $blog): ?>
  <h3><?= html_escape($blog['title']) ?></h3>
  <div>
    <?= html_escape($blog['content']) ?>
    <p><a href="<?= site_url("/blogs/{$blog['id']}/{$blog['permalink']}") ?>">View blog post</a>
  </div>
<?php endforeach ?>
