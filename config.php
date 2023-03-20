<?php

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

if (getenv("JAWSDB_URL")) {
    /* Pour l'application sur Heroku */


    $url = getenv('JAWSDB_URL');
    $dbparts = parse_url($url);

    $hostname = $dbparts['host'];
    $db_name = ltrim($dbparts['path'], '/');
    $db_user = $dbparts['user'];
    $db_password = $dbparts['pass'];
    $db_dsn = "mysql:host=$hostname;dbname=$db_name;charset=utf8mb4";




} else {
    /* Pour l'application en local */
    $db_dsn = getenv("DB_DSN");
    $db_user = getenv("DB_USER");
    $db_password = getenv("DB_PASSWORD");
}

define("DB_DSN", $db_dsn);
define("DB_USER", $db_user);
define("DB_PASSWORD", $db_password);

define("JWT_SECRET_KEY", getenv("JWT_SECRET_KEY"));

?>
