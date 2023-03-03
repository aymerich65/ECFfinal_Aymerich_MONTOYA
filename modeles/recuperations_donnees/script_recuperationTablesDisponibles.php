<?php
header("Access-Control-Allow-Origin: *");

require_once __DIR__ . '/../../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../../');
$dotenv->load();

try{
    $dsn = $_ENV['DB_DSN'];
    $pdo = new PDO($dsn,'root','');
    $myTable = $pdo->query("SELECT SUM(tables) AS total_tables_reserves FROM reservations");
    $myTable->execute();
    $row = $myTable->fetch(PDO::FETCH_ASSOC);
    $total_tables_reserves = htmlspecialchars($row['total_tables_reserves']);
    $tables_disponibles = 20 - $total_tables_reserves;
    header("Content-Type: application/json");
    echo json_encode(array('tablesDisponibles' => $tables_disponibles));
} catch(PDOException $e){
    echo json_encode(array('error' => 'Une erreur s\'est produite : '.$e->getMessage()));
}
?>
