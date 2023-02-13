<?php

$dsn = 'mysql:host=localhost;dbname=quaiantique';
$pdo = new PDO($dsn,'root','');
$password = $_POST['password'];
$email = $_POST['email'];
$_POST['logged_in']= null;

$statement = $pdo->prepare("SELECT*FROM clients WHERE email =:email");
$statement->bindValue(':email', $email);

if($statement->execute()){
    $user = $statement->fetch(PDO::FETCH_ASSOC);}

if ($user !== false &&   password_verify($password,$user['password'])){
    $_SESSION['logged_in'] = true;
    echo 'connexion  valide';

}else{
    echo 'connexion non valide';

}

    ob_start();
    ?>


<form method="POST" action="" class="formstyle">
    <div class="form-row">
        <div class="form-group col-md-12">
            <label for="email">Adresse Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Indiquez votre adresse email">
        </div>
        <div class="form-group col-md-12">
            <label for="password">Mot de passe</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Indiquez votre mot de passe">
        </div>
    <button type="submit">Connexion</button>
</form>

    <?php

    $contenu =ob_get_clean();

    require_once 'layout.php';