<?php
class RestaurantCardModificationManager
{
    public function updateEntry(string $table, int $id, string $titre, string $description, string $prix)
    {
        try {
            require_once __DIR__ . '/../../config.php';
            require_once __DIR__ . '/../../vendor/autoload.php';

            $pdo = new PDO(DB_DSN, DB_USER, DB_PASSWORD);

            $myTable = $pdo->prepare("UPDATE $table SET titre = :titre, description = :description, prix = :prix WHERE id = :id");
            $myTable->bindValue(':titre', $titre, PDO::PARAM_STR);
            $myTable->bindValue(':description', $description, PDO::PARAM_STR);
            $myTable->bindValue(':prix', $prix, PDO::PARAM_STR);
            $myTable->bindValue(':id', $id, PDO::PARAM_INT);
            $myTable->execute();

            echo 'Données modifiées';
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
    }
}
