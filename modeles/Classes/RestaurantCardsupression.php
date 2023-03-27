<?php

class RestaurantCardsupressionManager
{


    public function suppressionOnBdd(string $table, string $titre){




        try {

            /* Utilisation du fichier config pour récupérer les variables d'environnement:*/
            require_once __DIR__ . '/../../config.php';
            require_once __DIR__ . '/../../vendor/autoload.php';


            $pdo = new PDO(DB_DSN, DB_USER, DB_PASSWORD);


            $statement = $pdo->prepare("DELETE FROM $table WHERE titre = :titre");
            $statement->bindValue(':titre', $titre, PDO::PARAM_STR);

            $statement->execute();

            echo 'Suppression effectuée.';
            echo '<div class="button-container mytestcolor">';
            echo '<a href="../../index.php?page=admin"><button class="button-reservation-style">Retour page administrateur</button></a>';
            echo '</div>';
            exit;


        } catch (PDOException $PDOException) {
            echo 'il y a une erreur' . $PDOException->getMessage() . '<br>';
            echo '<div class="button-container mytestcolor">';
            echo '<a href="../../index.php?page=admin"><button class="button-reservation-style">Retour page administrateur</button></a>';
            echo '</div>';
            exit;
        }

    }
}