<?php
require_once __DIR__ . '/../../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../../');
$dotenv->load();
$dsn = $_ENV['DB_DSN'];
$envuser = $_ENV['DB_USER'];
$envpassword = $_ENV['DB_PASSWORD'];
$pdo = new PDO($dsn, $envuser , $envpassword);
$stmt = $pdo->query("SELECT capacité_totale FROM capacite_d_accueil");
$total_capacity = $stmt->fetchColumn();

header('Content-Type: application/json');
echo json_encode(array('total_capacity' => $total_capacity));
?>
