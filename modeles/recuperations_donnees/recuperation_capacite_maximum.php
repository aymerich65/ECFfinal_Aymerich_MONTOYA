<?php

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../config.php';
$pdo = new PDO(DB_DSN, DB_USER, DB_PASSWORD);





$stmt = $pdo->query("SELECT capacité_totale FROM capacite_d_accueil");
$total_capacity = $stmt->fetchColumn();

header('Content-Type: application/json');
echo json_encode(array('total_capacity' => $total_capacity));
?>
