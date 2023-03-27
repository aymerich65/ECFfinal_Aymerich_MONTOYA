<?php



require_once __DIR__ . '/../../vendor/autoload.php';

try {


    /* Utilisation du fichier config pour récupérer les variables d'environnement:*/
    require_once __DIR__ . '/../../config.php';
    require_once __DIR__ . '/../../vendor/autoload.php';
    $pdo = new PDO(DB_DSN, DB_USER, DB_PASSWORD);


    //var_dump($_POST);
    $email = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8');
    $date = htmlspecialchars($_POST['date'], ENT_QUOTES, 'UTF-8');
    $horaire = htmlspecialchars($_POST['horaire'], ENT_QUOTES, 'UTF-8');



    $statement = $pdo->prepare("DELETE FROM reservations WHERE email = :email AND date = :date AND horaire = :horaire");
    $statement->bindValue(':email', $email, PDO::PARAM_STR);
    $statement->bindValue(':date', date('Y-m-d', strtotime($date)), PDO::PARAM_STR);
    $statement->bindValue(':horaire', $horaire, PDO::PARAM_STR);
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
