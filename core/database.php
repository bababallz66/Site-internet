<?php
try {
    $pdo = new PDO('sqlite:' . dirname(dirname(__FILE__)) . '/site.db');
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    echo "Impossible d'accéder à la base de données SQLite : " . $e->getMessage();
    die();
}
