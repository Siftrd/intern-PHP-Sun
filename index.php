<?php
require "Controllers/HomeController.php";
require "Controllers/UserController.php";
require "Models/Database.php";
require "Models/Model.php";
require "Models/Movie.php";
require "Models/User.php";

session_start();

$config = require "resources/config/config.php";

$dsn = "mysql:host=".$config['db_host'].";dbname=".$config['db_name'];
$pdo = new PDO($dsn, $config['db_user'], $config['db_password'], $config['db_options']);
$db = new Database($pdo);

$homeController = new HomeController($db);
$userController = new UserController($db);
$userController->login();
$homeController->index();