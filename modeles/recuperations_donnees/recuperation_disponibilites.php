<?php
require_once __DIR__ . '/../../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../../');
$dotenv->load();
$dsn = $_ENV['DB_DSN'];
$envuser = $_ENV['DB_USERNAME'];
$envpassword = $_ENV['DB_PASSWORD'];
$pdo = new PDO($dsn, $envuser , $envpassword);

$data = json_decode(file_get_contents('php://input'));
$date = $data->date;
$heure = $data->heure;


$debut_creneau = sprintf("%02d:00:00", $heure);


$fin_creneau = sprintf("%02d:59:59", $heure);





$query_reserves = "SELECT SUM(couverts) as nb_couverts_res FROM reservations WHERE date = ? AND TIME(horaire) >= TIME(?) AND TIME(horaire) <= TIME(?)";
$stmt_reserves = $pdo->prepare($query_reserves);
$stmt_reserves->execute([$date, $debut_creneau, $fin_creneau]);
$result_reserves = $stmt_reserves->fetch(PDO::FETCH_ASSOC);
$nb_couverts_reserves = $result_reserves['nb_couverts_res'];


$query_capacity = "SELECT capacite_totale FROM capacite_d_accueil";
$stmt_capacity = $pdo->prepare($query_capacity);
$stmt_capacity->execute();
$result_capacity = $stmt_capacity->fetch(PDO::FETCH_ASSOC);
$total_capacity = $result_capacity['capacite_totale'];


$nb_couverts_dispo = $total_capacity - $nb_couverts_reserves;





header('Content-Type: application/json');
echo json_encode(array('nb_couverts_dispo' => $nb_couverts_dispo));

?>
