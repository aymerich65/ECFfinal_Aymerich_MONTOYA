<?php

require '../Classes/RestaurantCardsupression.php';


//var_dump($_POST);
$titre=htmlspecialchars($_POST['titre'], ENT_QUOTES);

$datasupression = new RestaurantCardsupressionManager();
$datasupression->suppressionOnBdd('plats',$titre);