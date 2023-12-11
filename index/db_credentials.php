<?php
// Ativar a exibição de erros
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$host = "200.236.3.126";
$user = "root";
$password = "example";
$database = "web";

$conn = new mysqli($host, $user, $password, $database);
?>
