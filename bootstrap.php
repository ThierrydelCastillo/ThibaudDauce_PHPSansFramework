<?php

define('SQLITE_DATABASE_PATH', __DIR__ . '/database/database.sqlite');

function pdo() {
    $path = __DIR__ . '/database/database.sqlite';
    $pdo = new PDO('sqlite:' . SQLITE_DATABASE_PATH);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $pdo;
}

function html_partial($name){
    require(__DIR__ . "../html_partials/$name.php");
}

function dd($variable) {
    echo "<pre>";
    print_r($variable);
    echo "</pre>";
}