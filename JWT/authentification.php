<?php

if (session_status() === PHP_SESSION_NONE) {


    if(isset($_ENV['DYNO'])){

        ini_set('session.cookie_secure', 1);

        ini_set('session.cookie_samesite', 'Strict');
    } else {

        ini_set('session.cookie_secure', 0);


    }

        session_start();

}

//require_once 'vendor/autoload.php';
use Firebase\JWT\JWT;

$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

require_once __DIR__ . '/../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();
$dsn = $_ENV['DB_DSN'];
$envuser = $_ENV['DB_USERNAME'];
$envpassword = $_ENV['DB_PASSWORD'];


if (isset($password) && isset($email)) {

    $pdo = new PDO($dsn, $envuser , $envpassword);

    $statement = $pdo->prepare("SELECT * FROM administrateurs WHERE email = :email");
    $statement->bindValue(':email', $email);
    if ($statement->execute()) {
        $user = $statement->fetch(PDO::FETCH_ASSOC);
        if ($user === false) {
            $statement = $pdo->prepare("SELECT * FROM clients WHERE email = :email");
            $statement->bindValue(':email', $email);
            if ($statement->execute()) {
                $user = $statement->fetch(PDO::FETCH_ASSOC);
                if ($user === false) {
                    echo 'Identifiant invalide';
                } else {
                    if (!password_verify($password, $user['password'])) {
                        echo 'Mot de passe invalide';
                    } else {
                        $_SESSION['convives'] = $user['convives'];
                        $_SESSION['allergies'] = $user['allergies'];
                        $_SESSION['email'] = $user['email'];
                        echo '<script>alert("Bienvenue!")</script>';
                        session_write_close();
                        header('Location: index.php?page=reservation');
                        exit;
                    }
                }
            }
        } else {
            if (!password_verify($password, $user['password'])) {
                echo 'Mot de passe invalide';
            } else {
                echo '<script>alert("Bienvenue administrateur!")</script>';


                $token = generateJWT($email);


                $_SESSION['jwt'] = $token;
                $_SESSION['admin'] = 'approuved';

                header('Location: index.php?page=admin');
                exit;
            }
        }
    }
}


function generateJWT($email)
{
    define('JWT_KEY', 'secret_key');
    define('JWT_EXPIRE', 3600);
    $key = JWT_KEY;
    $expiration = time() + JWT_EXPIRE;
    $issuer = 'example.com';

    $token = [
        'iss' => $issuer,
        'exp' => $expiration,
        'isa' => time(),
        'data' => [
            'email' => $email
        ]
    ];

    return JWT::encode($token, $key, 'HS256');
}


function validateJWT($token)
{
    try {
        $decoded = JWT::decode($token, JWT_KEY, array('HS256'));
        return $decoded->data;
    } catch (Exception $e) {
        return false;
    }
}
