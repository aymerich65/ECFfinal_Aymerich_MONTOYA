<?php
require_once __DIR__ . '/../../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../../');
$dotenv->load();
$dsn = $_ENV['DB_DSN'];
$envuser = $_ENV['DB_USER'];
$envpassword = $_ENV['DB_PASSWORD'];
$pdo = new PDO($dsn, $envuser , $envpassword);

$data = json_decode(file_get_contents('php://input'));
$date = $data->date;
$heure = $data->heure;

// Heure de début du créneau horaire
$debut_creneau = sprintf("%02d:00:00", $heure);

// Heure de fin du créneau horaire
$fin_creneau = sprintf("%02d:59:59", $heure);

// Requête SQL pour récupérer le nombre de couverts réservés pour l'heure spécifiée
$query = "SELECT SUM(couverts) as nb_couverts_res FROM reservations WHERE date = ? AND TIME(horaire) >= TIME(?) AND TIME(horaire) <= TIME(?)";
$stmt = $pdo->prepare($query);
$stmt->execute([$date, $debut_creneau, $fin_creneau]);
$result = $stmt->fetch(PDO::FETCH_ASSOC);
$nb_couverts_res = $result['nb_couverts_res'];

// Calcule le nombre de couverts disponibles pour l'heure spécifiée
$nb_couverts_dispo = 50 - $nb_couverts_res;

// Retourne le nombre de couverts disponibles en tant que réponse JSON
header('Content-Type: application/json');
echo json_encode(array('nb_couverts_dispo' => $nb_couverts_dispo));

?>
