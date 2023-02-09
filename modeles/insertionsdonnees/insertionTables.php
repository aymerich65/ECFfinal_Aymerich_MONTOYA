<?php


try {
    var_dump($_POST);

    $tables_disponibles= $_POST['tables'];

    $dsn = 'mysql:host=localhost;dbname=quaiantique';
    $pdo = new PDO($dsn, 'root', '');
    $myTable = $pdo->prepare("INSERT INTO tables (tables_disponibles) VALUES (:tables_disponibles)");
    $myTable->bindValue(':tables_disponibles', $tables_disponibles, PDO::PARAM_INT);

    $myTable->execute();
} catch (PDOException $PDOException) {
    echo 'il y a une erreur' . $PDOException->getMessage() . '<br>';
}
