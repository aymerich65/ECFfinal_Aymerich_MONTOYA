<?php


$couverts =htmlspecialchars($_POST['couverts'], ENT_QUOTES);
$allergies=htmlspecialchars($_POST['allergies'], ENT_QUOTES);
$email=htmlspecialchars($_POST['email'], ENT_QUOTES);
$schedule=htmlspecialchars($_POST['heure'], ENT_QUOTES);
$date = htmlspecialchars($_POST['date'], ENT_QUOTES);
$date_mysql = date('Y-m-d', strtotime($date));


require_once __DIR__ . '/../../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../../');
$dotenv->load();
$dsn = $_ENV['DB_DSN'];
$envuser = $_ENV['DB_USER'];
$envpassword = $_ENV['DB_PASSWORD'];


$pdo = new PDO($dsn, $envuser , $envpassword);






/* envoie réservation en bdd */
$myTable = $pdo->prepare("INSERT INTO reservations (couverts, email, allergies, date, horaire) VALUES (:couverts, :email,:allergies, :date, :horaire)");
$myTable->bindValue(':couverts', $couverts, PDO::PARAM_STR);
$myTable->bindValue(':email', $email, PDO::PARAM_STR);
$myTable->bindValue(':allergies', $allergies, PDO::PARAM_STR);
$myTable->bindValue(':date', $date_mysql, PDO::PARAM_STR);
$myTable->bindValue(':horaire', $schedule, PDO::PARAM_STR);

$myTable->execute();




echo '<script>alert("Votre réservation a été enregistrée avec succès!")</script>';
header('Refresh: 0; url=../../index.php');
exit;



?>

