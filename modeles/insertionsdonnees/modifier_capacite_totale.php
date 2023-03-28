<?php
try{

    /* Utilisation du fichier config pour récupérer les variables d'environnement:*/
    require_once __DIR__ . '/../../config.php';
    require_once __DIR__ . '/../../vendor/autoload.php';
    $pdo = new PDO(DB_DSN, DB_USER, DB_PASSWORD);





    //var_dump($_POST);
    $capacity=htmlspecialchars($_POST['capacite_totale'], ENT_QUOTES);


    $myTable = $pdo->prepare("UPDATE capacite_d_accueil SET capacite_totale = :capacite_totale");
    $myTable->bindValue(':capacite_totale', $capacity, PDO::PARAM_INT);
    $myTable->execute();

    echo '<script>alert("Modification envoyée redirection vers l\'accueil")</script>';
    echo '<div class="button-container mytestcolor">';
    echo '<a href="../../index.php?page=admin"><button class="button-reservation-style">Retour page administrateur</button></a>';
    echo '</div>';
    exit;

}catch(PDOException $PDOException){
    echo 'il y a une erreur'.$PDOException->getMessage().'<br>';
    echo '<div class="button-container mytestcolor">';
    echo '<a href="../../index.php?page=admin"><button class="button-reservation-style">Retour page administrateur</button></a>';
    echo '</div>';
    exit;
}
