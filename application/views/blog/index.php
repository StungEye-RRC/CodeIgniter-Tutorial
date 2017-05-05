<h2><?= $title ?></h2>

<?php foreach($blogs as $blog): ?>
  <h3><?= $blog['title'] ?></h3>
  <div>
    <?= $blog['content'] ?>
  </div>
<?php endforeach ?>
