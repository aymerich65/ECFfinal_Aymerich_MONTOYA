<?php

    require_once __DIR__ . '/../../vendor/autoload.php';
    require_once __DIR__ . '/../../config.php';
    $pdo = new PDO(DB_DSN, DB_USER, DB_PASSWORD);

try{





    $myTable = $pdo->query("SELECT FROM client WHERE email = :email");
    $myTable->execute();
    $row = $myTable->fetch(PDO::FETCH_ASSOC);


    $availablesTable = htmlspecialchars($row['tables_disponibles']);


    header("Content-Type: application/json");
    echo json_encode($availablesTable);

} catch(PDOException $e){
    echo 'il y a une erreur:'.$e->getMessage();
}

