<?php

ini_set('display_errors', '0');

if(session_status() === PHP_SESSION_NONE){
    session_start();
}

session_start();

set_exception_handler(function (Throwable $exception) {
    error_log($exception);
    echo 'Une erreur technique s\'est produite. Veuillez réessayer plus tard.';
});

set_error_handler(function ($errno, $errstr, $errfile, $errline) {
    error_log("Erreur PHP: [$errno] $errstr dans le fichier $errfile à la ligne $errline");
    echo 'Une erreur s\'est produite. Veuillez réessayer plus tard.';
});








require_once 'controleurs/controles.php';
//require_once 'JWT/verificationCookieJwt.php';

$id= 'accueil';
$id = isset($_GET['page']) ? $_GET['page'] : 'accueil';
$controleur = new controles();

if ($id === 'admin') {
    $controleur->pageAdmin();
} elseif ($id === 'connexion') {
    $controleur->pageConnexion();
} elseif ($id === 'test') {
    $controleur->pagetest();
} elseif ($id === 'reservation') {
    $controleur->pageReservation();
} elseif ($id === 'accueil') {
    $controleur->pageAccueil();
} elseif ($id === 'carte') {
    $controleur->pageCarte();
}elseif ($id === 'a_propos') {
    $controleur->pageA_propos();
}else {
    echo 'Page non trouvée';
}
