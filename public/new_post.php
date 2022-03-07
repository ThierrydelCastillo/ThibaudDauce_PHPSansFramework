<?php
    include('../bootstrap.php');
    
    $errors = [];

    if(empty($_POST['title'])) {
        $errors['title'] = "le titre est obligatoire";
    }

    if(empty($_POST['body'])) {
        $errors['body'] = "le contenu est obligatoire";
    }

    if(empty($errors)) {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $pdo = pdo();
            
            $pdo->prepare('INSERT INTO posts (title, body) VALUES (?, ?)')
                ->execute([$_POST['title'], $_POST['body']]);
            $id = $pdo->lastInsertId();
            
            header("Location: /post.php?id=$id");
            die();  // pour etre sur que rien ne s'affiche avant le redirection
        }
    }
?>


<?php html_partial('header') ?>

<h1>Ecrire un nouvel article</h1>


<form method="post">
    <?php if(isset($errors['title'])): ?>
        <p><?= $errors['title'] ?></p>
    <?php endif ?>
    <p>
        <input type="text" name="title" value="<?= $_POST['title'] ?? '' ?>">
    </p>
    <?php if(isset($errors['body'])): ?>
        <p><?= $errors['body'] ?></p>
    <?php endif ?>
    <p>
        <textarea name="body"><?= $_POST['body'] ?? '' ?></textarea>
    </p>
    <p>
        <button>Envoyer</button>
    </p>
</form>

<?php html_partial('footer') ?>