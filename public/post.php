<?php
    include('../bootstrap.php');

    $pdo = pdo();
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    $query = $pdo->prepare('SELECT * FROM posts WHERE id = ?');
    $query->execute([$_GET['id']]);

    $post = $query->fetch();
?>

<?php html_partial('header') ?>

<h1><?= $post['title']?></h1>
<p><?= $post['body']?></p>

<?php html_partial('footer') ?>