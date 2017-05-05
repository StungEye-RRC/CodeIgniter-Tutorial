<h2><?= $title ?></h2>

<?php foreach($blogs as $blog): ?>
  <h3><?= $blog['title'] ?></h3>
  <div>
    <?= $blog['content'] ?>
    <p><a href="<?= site_url('/blog/' . $blog['permalink']) ?>">View blog post</a>
  </div>
<?php endforeach ?>
