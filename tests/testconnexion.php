<?php

ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', __DIR__ . '/error.log');
error_reporting(E_ALL);

try {
    $dbh = new PDO('mysql:host=localhost;dbname=quaiantique', 'root', '');
} catch (PDOException $e) {
    error_log('La connexion à la base de données a échoué : ' . $e->getMessage());
    echo 'La connexion à la base de données a échoué : ' . $e->getMessage();
    exit;
}
