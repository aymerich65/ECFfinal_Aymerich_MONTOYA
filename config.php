<?php
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$hostname = getenv('DB_HOSTNAME');
$db_name = getenv('DB_NAME');
$db_user = getenv('DB_USER');
$db_password = getenv('DB_PASSWORD');
$db_dsn = "mysql:host=$hostname;dbname=$db_name;charset=utf8mb4";

define("DB_DSN", $db_dsn);
define("DB_USER", $db_user);
define("DB_PASSWORD", $db_password);

echo $hostname . "<br>";
echo $db_name . "<br>";
echo $db_user . "<br>";
echo $db_password . "<br>";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


define("JWT_SECRET_KEY", getenv("JWT_SECRET_KEY"));
