<?php include('../header.php') ?>

<?php
    $path = __DIR__ . '/../database/database.sqlite';
    $pdo = new PDO("sqlite:$path");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    $query = $pdo->prepare('SELECT * FROM posts');
    $result = $query->execute();
    $posts = $query->fetchAll();
?>

<h1>Page d'accueil</h1>

<ul>
    <?php foreach($posts as $post): ?>
        <li><?= $post['title']?></li>
    <?php endforeach ?>
</ul>
<p>
    <a href="/new_post.php">Ecrire un nouvel article</a>
</p>

<?php include('../footer.php') ?>