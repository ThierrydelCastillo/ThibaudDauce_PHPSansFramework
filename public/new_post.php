<?php
    include('../bootstrap.php');
    
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $pdo = pdo();
        
        $pdo->prepare('INSERT INTO posts (title, body) VALUES (?, ?)')
            ->execute([$_POST['title'], $_POST['body']]);
            
        var_dump($_POST);
        die;
    }
?>

<?php include('../header.php') ?>

<h1>Ecrire un nouvel article</h1>


<form method="post">
    <p>
        <input type="text" name="title">
    </p>
    <p>
        <textarea name="body"></textarea>
    </p>
    <p>
        <button>Envoyer</button>
    </p>
</form>

<?php include('../footer.php') ?>