<?php
try{
    $dsn = 'mysql:host=localhost;dbname=quaiantique';
    $pdo = new PDO($dsn,'root','');
    $myTable = $pdo->query("SELECT * FROM reservations");
    $myTable->execute();
    $myStarterTable= $myTable->fetchAll(PDO::FETCH_ASSOC);



} catch(PDOException $e){
    echo 'il y a une erreur:'.$e->getMessage();
}
?>
<h1>Notre carte</h1>
<h2>Entrées</h2>
<h3><?php echo $myStarterTable['titre']?></h3>
<p><?php echo $myStarterTable['description']?></p>
<p>Prix : <?php echo $myStarterTable['prix']?></p>
<br>
<h2>Plat</h2>
<h3><?php echo $myStarterTable['titre']?></h3>
<p><?php echo $myStarterTable['description']?></p>
<p>Prix : <?php echo $myStarterTable['prix']?></p>
<br>
<h2>Dessert</h2>
<h3><?php echo $myStarterTable['titre']?></h3>
<p><?php echo $myStarterTable['description']?></p>
<p>Prix : <?php echo $myStarterTable['prix']?></p>