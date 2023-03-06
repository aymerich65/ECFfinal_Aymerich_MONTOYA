<?php
require_once 'vendor/firebase/php-jwt/src/JWT.php';



require_once __DIR__ . '/../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

$secret_key = $_ENV['JWT_SECRET_KEY'];



use \Firebase\JWT\JWT;

if (isset($_COOKIE['jwt'])) {
    $jwt = $_COOKIE['jwt'];
   // $secret_key = 'Clé_secrète';
    try {
        $decoded = JWT::decode($jwt, $secret_key, array('HS256'));
        var_dump($decoded);
        $user_id = $decoded->user_id;
        $issued_at = $decoded->issued_at;
        $expiration_time = $decoded->exp;


        $current_time = time();
        if ($current_time > $expiration_time) {
            header('HTTP/1.0 403 Forbidden', true, 403);
            echo "Le jeton d'authentification a expiré.";
            exit;
        }


        $_SESSION['logged_in'] = true;

    } catch (Exception $e) {
        $_SESSION['logged_in'] = false;
    }
}

if ($_SESSION['logged_in']) {

} else {

    header('Location: index.php');
    exit;
}
