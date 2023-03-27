<?php

require '../Classes/RestaurantCardInsertion.php';



//var_dump($_POST);


$titre=htmlspecialchars($_POST['titre'], ENT_QUOTES);
$description= htmlspecialchars($_POST['description'], ENT_QUOTES);
$prix= htmlspecialchars($_POST['prix'], ENT_QUOTES);





$entereddish = new RestaurantCardInsertionManager();

$entereddish->insertionOnBdd('desserts',$titre,$description,$prix);



