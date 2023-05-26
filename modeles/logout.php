<?php
session_start();
session_destroy();

// Redirection vers la page d'accueil
header('Location: https://quaiantique-chambery.herokuapp.com/index.php?page=accueil');
exit;
?>
