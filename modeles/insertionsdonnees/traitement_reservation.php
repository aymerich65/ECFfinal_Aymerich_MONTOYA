<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


/* mon système d'envoi du mail*/
ini_set('SMTP', 'localhost');
ini_set('smtp_port', 1025);

$clientmail = htmlspecialchars($_POST['email']);
$subject = 'Confirmation réservation';
$message = 'Votre réservation a bien était prise en compte: Client : '.$_POST['email'].' Horaire  :'. $_POST['heure'];
$headers = 'From: QuaiAntique@fictif.fr' . "\r\n" .
    'Reply-To: QuaiAntique@fictif.fr' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
mail($clientmail, $subject, $message, $headers);

/*
$mail = new PHPMailer(true);

$mail->isSMTP();
$mail->Host       = 'smtp.sendgrid.net';
$mail->SMTPAuth   = true;
$mail->Username   = 'apikey';
$mail->Password   = 'YOUR_SENDGRID_API_KEY';
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port       = 587;

$mail->setFrom('your-email@your-domain.com', 'Your Name');
$mail->addAddress('recipient-email@recipient-domain.com', 'Recipient Name');
$mail->isHTML(true);
$mail->Subject = 'Test Email from PHPMailer';
$mail->Body    = 'This is a test email sent from PHPMailer using SendGrid SMTP.';

if (!$mail->send()) {
    echo 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}

*/




/* fin du système d'envoi de mail*/







$tables = $_POST['convives'];
if ($tables % 2 == 1) {
    $tables = ceil($tables/2)*2;
}

$tables =htmlspecialchars($tables);
$allergies=htmlspecialchars($_POST['allergies']);
$email=htmlspecialchars($_POST['email']);
$schedule=htmlspecialchars($_POST['heure']);
$date = $_POST['date'];
$date_mysql = date('Y-m-d', strtotime($date));



$dsn = 'mysql:host=localhost;dbname=quaiantique';
$pdo = new PDO($dsn,'root','');

$statement = $pdo->prepare('SELECT tables_disponibles FROM tables WHERE id = 1' );
$statement->execute();
$donnees = $statement->fetch();
$tables_disponibles = $donnees['tables_disponibles'];

$tables_disponibles -= $tables;

$statement = $pdo->prepare('UPDATE tables SET tables_disponibles = :tables_disponibles WHERE id = 1' );
$statement->bindParam(':tables_disponibles', $tables_disponibles);
$statement->execute();

/* envoie réservation en bdd */
$myTable = $pdo->prepare("INSERT INTO reservations (tables, email, allergies, date, horaire) VALUES (:tables, :email,:allergies, :date, :horaire)");
$myTable->bindValue(':tables', $tables, PDO::PARAM_STR);
$myTable->bindValue(':email', $email, PDO::PARAM_STR);
$myTable->bindValue(':allergies', $allergies, PDO::PARAM_STR);
$myTable->bindValue(':date', $date_mysql, PDO::PARAM_STR);
$myTable->bindValue(':horaire', $schedule, PDO::PARAM_STR);

$myTable->execute();