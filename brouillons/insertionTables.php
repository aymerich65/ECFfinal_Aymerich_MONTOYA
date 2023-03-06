<?php


try {
    var_dump($_POST);

    require_once __DIR__ . '/../../vendor/autoload.php';
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../../');
    $dotenv->load();

    $tables_disponibles= $_POST['tables'];

    $dsn = $_ENV['DB_DSN'];
    $envuser = $_ENV['DB_USER'];
    $envpassword = $_ENV['DB_PASSWORD'];

    $pdo = new PDO($dsn, $envuser , $envpassword);
    $myTable = $pdo->prepare("INSERT INTO tables2 (tables_disponibles) VALUES (:tables_disponibles)");
    $myTable->bindValue(':tables_disponibles', $tables_disponibles, PDO::PARAM_INT);

    $myTable->execute();
} catch (PDOException $PDOException) {
    echo 'il y a une erreur' . $PDOException->getMessage() . '<br>';
}
