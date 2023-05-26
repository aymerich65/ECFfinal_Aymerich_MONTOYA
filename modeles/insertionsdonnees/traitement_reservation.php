<?php

/* Utilisation du fichier config pour récupérer les variables d'environnement:*/
require_once __DIR__ . '/../../config.php';
require_once __DIR__ . '/../../vendor/autoload.php';
$pdo = new PDO(DB_DSN, DB_USER, DB_PASSWORD);




try{
$couverts =htmlspecialchars($_POST['couverts'], ENT_QUOTES);
$allergies=htmlspecialchars($_POST['allergies'], ENT_QUOTES);
$email=htmlspecialchars($_POST['email'], ENT_QUOTES);
$schedule=htmlspecialchars($_POST['heure'], ENT_QUOTES);
$date = htmlspecialchars($_POST['date'], ENT_QUOTES);
$date_mysql = date('Y-m-d', strtotime($date));









/* envoie réservation en bdd */
$myTable = $pdo->prepare("INSERT INTO reservations (couverts, email, allergies, date, horaire) VALUES (:couverts, :email,:allergies, :date, :horaire)");
$myTable->bindValue(':couverts', $couverts, PDO::PARAM_STR);
$myTable->bindValue(':email', $email, PDO::PARAM_STR);
$myTable->bindValue(':allergies', $allergies, PDO::PARAM_STR);
$myTable->bindValue(':date', $date_mysql, PDO::PARAM_STR);
$myTable->bindValue(':horaire', $schedule, PDO::PARAM_STR);

$myTable->execute();





    echo '<script>alert("Votre réservation a été enregistrée avec succès!")</script>';
    header('Refresh: 0; url=../../index.php');
    exit;


}catch(PDOException $PDOException) {
    //echo 'il y a une erreur' . $PDOException->getMessage() . '<br>';
    echo 'Il y a une erreur<br>';
    echo '<div class="button-container mytestcolor">';
    echo '<a href="../../index.php?page=accueil"><button class="button-reservation-style">Retour accueil</button></a>';
    echo '</div>';
    exit;
}
?>

