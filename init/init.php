<?php
require_once 'function.php';
$pdo = new PDO('mysql:host=localhost;dbname=project;', 'root', '', [PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8']);
define('URL', " http://localhost/PHP/project/public/assets/upload");
define('BASE', $_SERVER['DOCUMENT_ROOT'] . '/PHP/project/public/assets/upload/');
