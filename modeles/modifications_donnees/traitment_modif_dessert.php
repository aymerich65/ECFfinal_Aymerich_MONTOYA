<?php

require '../Classes/RestaurantCardModification.php';

$id = $_POST['id'];
$titre = htmlspecialchars($_POST['titre'], ENT_QUOTES);
$description = htmlspecialchars($_POST['description'], ENT_QUOTES);
$prix = htmlspecialchars($_POST['prix'], ENT_QUOTES);

$cardModification = new RestaurantCardModificationManager();
$cardModification->updateEntry('desserts', $id, $titre, $description, $prix);
