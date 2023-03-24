<?php
if(session_status() === PHP_SESSION_NONE){
    session_start();
}
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
}elseif ($id === 'horaires') {
    $controleur->pageHoraires();
} elseif ($id === 'a_propos') {
    $controleur->pageA_propos();
}else {
    echo 'Page non trouvée';
}
