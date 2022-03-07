<?php
    include('../bootstrap.php');

    $id = filter_var($_GET['id'] ?? null, FILTER_VALIDATE_INT);
    if($id === false) {
        http_response_code(404);
        html_partial('404');
        die();
    }

    $pdo = pdo();
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    $query = $pdo->prepare('SELECT * FROM posts WHERE id = ?');
    $query->execute([$id]);

    $post = $query->fetch();

    if($post === false) {
        http_response_code(404);
        html_partial('404');
        die();
    }
?>

<?php html_partial('header') ?>

<h1><?= $post['title']?></h1>
<p><?= $post['body']?></p>

<hr>

<form action="/new_comment.php" method="post">
    <input type="hidden" name="post_id" value="<?=$post['id'] ?>">
    <p>
        <label for="author">Auteur</label>
        <input type="text" name="author" id="author">
    </p>
    <p>
        <label for="body">commentaire</label>
        <textarea name="body" id="body"></textarea>
    </p>
    <p>
        <button>Envoyer le commentaire</button>
    </p>
</form>

<?php html_partial('footer') ?>