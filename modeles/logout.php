<?php
session_start();
session_destroy();

// Nettoyer le tampon de sortie
ob_clean();

// Redirection vers la page d'accueil
header('Location: /index.php?page=accueil');
exit;
?>
