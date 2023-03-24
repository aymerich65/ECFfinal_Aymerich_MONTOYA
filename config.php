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

define("JWT_SECRET_KEY", getenv("JWT_SECRET_KEY"));
