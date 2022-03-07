<?php

require_once('../bootstrap.php');

$pdo = pdo();
$pdo->prepare('INSERT INTO comments (post_id, author, body) VALUES (?, ?, ?)')
    ->execute([$_POST['post_id'], $_POST['author'], $_POST['body']]);
