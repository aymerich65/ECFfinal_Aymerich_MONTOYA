<?php

require_once __DIR__ . '/../../vendor/autoload.php';

use Dotenv\Dotenv;


// Chargement des variables d'environnement
$dotenv = Dotenv::createImmutable(__DIR__ . '/../../');
$dotenv->load();

// Connexion à la base de données
$dsn = $_ENV['DB_DSN'];
$envuser = $_ENV['DB_USER'];
$envpassword = $_ENV['DB_PASSWORD'];
$pdo = new PDO($dsn, $envuser, $envpassword);

try {
    // Récupération de la date actuelle au format YYYY-MM-DD
    $currentDate = date('Y-m-d');

    // Suppression des réservations pour la date actuelle
    $statement = $pdo->prepare("DELETE FROM reservations WHERE date = :currentDate");
    $statement->bindValue(':currentDate', $currentDate, PDO::PARAM_STR);
    $statement->execute();

    // Message de confirmation
    echo "Les réservations pour le $currentDate ont été supprimées avec succès !";
} catch (PDOException $PDOException) {
    echo 'Il y a une erreur : ' . $PDOException->getMessage();
}
