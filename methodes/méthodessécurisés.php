<?php
//test métohdes sécurisées
require_once 'fichier.env';

$dsn = getenv('DB_DSN');
var_dump($dsn);

/*
$user = getenv('DB_USER');
$password = getenv('DB_PASSWORD');

$pdo = new PDO($dsn, $user, $password);
$statement = $pdo->query('SELECT*FROM entrees');
$statement->fetchAll();
var_dump($statement);

*/

