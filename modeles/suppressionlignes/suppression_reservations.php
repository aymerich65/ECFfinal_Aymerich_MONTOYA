<?php
require_once __DIR__ . '/../../vendor/autoload.php';



try {

    /* Utilisation du fichier config pour récupérer les variables d'environnement:*/
    require_once __DIR__ . '/../../config.php';
    require_once __DIR__ . '/../../vendor/autoload.php';
    $pdo = new PDO(DB_DSN, DB_USER, DB_PASSWORD);


    $currentDate = (new DateTime('now', new DateTimeZone('Europe/Paris')))->format('Y-m-d');


    $statement = $pdo->prepare("DELETE FROM reservations WHERE date = :currentDate");
    $statement->bindValue(':currentDate', $currentDate, PDO::PARAM_STR);
    $statement->execute();


    echo 'Suppression effectuée.';
    echo '<div class="button-container mytestcolor">';
    echo '<a href="../../index.php?page=admin"><button class="button-reservation-style">Retour page administrateur</button></a>';
    echo '</div>';
    exit;
} catch (PDOException $PDOException) {
    echo 'Il y a une erreur : ' . $PDOException->getMessage();
    echo '<div class="button-container mytestcolor">';
    echo '<a href="../../index.php?page=admin"><button class="button-reservation-style">Retour page administrateur</button></a>';
    echo '</div>';
    exit;
}
