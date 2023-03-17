<?php
try{
 //var_dump($_POST);
    $email=htmlspecialchars($_POST['email'], ENT_QUOTES);
    $password= htmlspecialchars($_POST['password'], ENT_QUOTES);
    $convives= htmlspecialchars($_POST['convives'], ENT_QUOTES);
    $allergies= htmlspecialchars($_POST['allergies'], ENT_QUOTES);


    require_once __DIR__ . '/../../vendor/autoload.php';
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../../');
    $dotenv->load();

    $dsn = $_ENV['DB_DSN'];
    $envuser = $_ENV['DB_USER'];
    $envpassword = $_ENV['DB_PASSWORD'];

    $pdo = new PDO($dsn, $envuser , $envpassword);
    $myTable = $pdo->prepare("INSERT INTO clients (email, password, convives, allergies) VALUES (:email, :password, :convives, :allergies)");
    $myTable->bindValue(':email', $email, PDO::PARAM_STR);
    $myTable->bindValue(':password', password_hash($password,PASSWORD_BCRYPT));
    $myTable->bindValue(':convives', $convives, PDO::PARAM_INT);
    $myTable->bindValue(':allergies', $allergies, PDO::PARAM_STR);
    $myTable->execute();
    echo '<script>alert("Inscription validée redirection vers l\'accueil")</script>';
    echo '<div class="button-container mytestcolor">';
    echo '<a href="../../index.php?page=accueil"><button class="button-reservation-style">Retour accueil</button></a>';
    echo '</div>';
    exit;
}catch(PDOException $PDOException){
    echo 'il y a une erreur'.$PDOException->getMessage().'<br>';
    echo '<div class="button-container mytestcolor">';
    echo '<a href="../../index.php?page=accueil"><button class="button-reservation-style">Retour accueil</button></a>';
    echo '</div>';
    exit;
}
