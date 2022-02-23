<?php
include('../bootstrap.php');

$pdo = pdo();
if(file_exists(SQLITE_DATABASE_PATH)) unlink(SQLITE_DATABASE_PATH); // Efface le fichier database

$query = $pdo->prepare('
        CREATE TABLE posts(
            id INTEGER PRIMARY KEY,
            title VARCHAR(255) NOT NULL,
            body TEXT NOT NULL
        )
    ');

$query->execute();