<?php

// TODO: why don't work with just '/../../vendor/autoload.php' path?
require_once  __DIR__ . "/../../vendor/autoload.php";

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__ . '/../../');
$dotenv->load();

// this don't work
//$DB_HOST = getenv("DB_HOST");
//$DB_USER = getenv("DB_USER");
//$DB_PASS = getenv("DB_PASS");
//$DB_NAME = getenv("DB_NAME");

define("DB_HOST", $_ENV['DB_HOST']);
define("DB_USER", $_ENV['DB_USER']);
define("DB_PASS", $_ENV['DB_PASS']);
define("DB_NAME", $_ENV['DB_NAME']);

// don't work with const
//const DB_HOST = $_ENV['DB_HOST'];
//const DB_USER = $_ENV['DB_USER'];
//const DB_PASS = $_ENV['DB_PASS'];
//const DB_NAME = $_ENV['DB_NAME'];

//$connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
//if ($connection) {echo "DB Connection true";}