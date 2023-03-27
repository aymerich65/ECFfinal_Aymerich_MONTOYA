<?php





 class RestaurantCardInsertionManager
{
    /* Utilisation du fichier config pour récupérer les variables d'environnement:*/

 public function insertionOnBdd(string $table, string $titre,string $description,string $prix ){



     /* traitement des variables: */

    try{
        require_once __DIR__ . '/../../config.php';
        require_once __DIR__ . '/../../vendor/autoload.php';


        $pdo = new PDO(DB_DSN, DB_USER, DB_PASSWORD);



        $myTable = $pdo->prepare("INSERT INTO $table (titre, description, prix) VALUES (:titre, :description, :prix)");
        $myTable->bindValue(':titre', $titre, PDO::PARAM_STR);
        $myTable->bindValue(':description', $description, PDO::PARAM_STR);
        $myTable->bindValue(':prix', $prix, PDO::PARAM_STR);
        $myTable->execute();
        echo 'Données envoyées';
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







}


}