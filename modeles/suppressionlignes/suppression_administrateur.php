<?php


require_once __DIR__ . '/../../vendor/autoload.php';

try {
    $email = $_POST['email'];

    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../../');
    $dotenv->load();

    $dsn = $_ENV['DB_DSN'];
    $envuser = $_ENV['DB_USERNAME'];
    $envpassword = $_ENV['DB_PASSWORD'];

    $pdo = new PDO($dsn, $envuser, $envpassword);
    $statement = $pdo->prepare("DELETE FROM Administrateurs WHERE email = :email");
    $statement->bindValue(':email', $email, PDO::PARAM_STR);

    $statement->execute();

    echo 'Suppression effectuée.';
    echo '<div class="button-container mytestcolor">';
    echo '<a href="../../index.php?page=admin"><button class="button-reservation-style">Retour page administrateur</button></a>';
    echo '</div>';
    exit;

} catch (PDOException $PDOException) {
    echo 'Il y a une erreur : ' . $PDOException->getMessage() . '<br>';

    echo '<div class="button-container mytestcolor">';
    echo '<a href="../../index.php?page=admin"><button class="button-reservation-style">Retour page administrateur</button></a>';
    echo '</div>';
    exit;
}
