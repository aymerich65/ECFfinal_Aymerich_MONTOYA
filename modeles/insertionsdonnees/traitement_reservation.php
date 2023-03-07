<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


/* mon système d'envoi du mail:*/
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


$couverts =htmlspecialchars($_POST['couverts']);
$allergies=htmlspecialchars($_POST['allergies']);
$email=htmlspecialchars($_POST['email']);
$schedule=htmlspecialchars($_POST['heure']);
$date = $_POST['date'];
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