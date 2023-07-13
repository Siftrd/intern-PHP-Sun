<?php
require "Controllers/Controller.php";
require "Models/Database.php";
require "Models/Model.php";
require "Models/Movie.php";
require "Models/User.php";

session_start();

$config = require "resources/config/config.php";

$dsn = "mysql:host=".$config['db_host'].";dbname=".$config['db_name'];
$pdo = new PDO($dsn, $config['db_user'], $config['db_password'], $config['db_options']);
$db = new Database($pdo);

$controller = new Controller($db);

$controller->login();
$controller->index();