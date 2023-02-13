<?php

try{
    $dsn = 'mysql:host=localhost;dbname=quaiantique';
    $pdo = new PDO($dsn,'root','');
    $myTable = $pdo->query("SELECT FROM client WHERE email = :email");
    $myTable->execute();
    $row = $myTable->fetch(PDO::FETCH_ASSOC);


    $availablesTable = htmlspecialchars($row['tables_disponibles']);


    header("Content-Type: application/json");
    echo json_encode($availablesTable);

} catch(PDOException $e){
    echo 'il y a une erreur:'.$e->getMessage();
}

