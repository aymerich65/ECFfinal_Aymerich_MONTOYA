<?php
header("Access-Control-Allow-Origin: *");

require_once __DIR__ . '/../../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../../');
$dotenv->load();

try{
    $dsn = $_ENV['DB_DSN'];
    $pdo = new PDO($dsn,'root','');
    $myTable = $pdo->query("SELECT tables_disponibles FROM tables");
    $myTable->execute();
    $row = $myTable->fetch(PDO::FETCH_ASSOC);
    $availablesTable = htmlspecialchars($row['tables_disponibles']);
    header("Content-Type: application/json");
    echo json_encode(array('tablesDisponibles' => $availablesTable));
} catch(PDOException $e){
    echo json_encode(array('error' => 'Une erreur s\'est produite : '.$e->getMessage()));
}
?>
