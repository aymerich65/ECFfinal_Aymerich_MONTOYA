<?php

/* Utilisation du fichier config pour récupérer les variables d'environnement:*/
require_once __DIR__ . '/../../config.php';
require_once __DIR__ . '/../../vendor/autoload.php';
$pdo = new PDO(DB_DSN, DB_USER, DB_PASSWORD);


try{

    $email=htmlspecialchars($_POST['email'], ENT_QUOTES);
    $poste=htmlspecialchars($_POST['poste'], ENT_QUOTES) ;
    $password= htmlspecialchars($_POST['password'], ENT_QUOTES);


    $myTable = $pdo->prepare("INSERT INTO Administrateurs (email, poste, password) VALUES (:email, :poste,  :password)");
    $myTable->bindValue(':email', $email, PDO::PARAM_STR);
    $myTable->bindValue(':poste', $poste, PDO::PARAM_STR);
    $myTable->bindValue(':password', password_hash($password,PASSWORD_BCRYPT));

    $myTable->execute();

    echo '<script>alert("Données insérées en base de donnée")</script>';
    echo '<div class="button-container mytestcolor">';
    echo '<a href="../../index.php?page=admin"><button class="button-reservation-style">Retour page administrateur</button></a>';
    echo '</div>';
    exit;

}catch(PDOException $PDOException){
    //echo 'il y a une erreur'.$PDOException->getMessage().'<br>';
    echo 'Il y a une erreur<br>';
    echo '<div class="button-container mytestcolor">';
    echo '<a href="../../index.php?page=admin"><button class="button-reservation-style">Retour page administrateur</button></a>';
    echo '</div>';
    exit;
}

