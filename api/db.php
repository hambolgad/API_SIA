<?php
$host = "localhost";
$dbname = "bookmate";
$username = "root";   // XAMPP default
$password = "";       // XAMPP default

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    die(json_encode(["status" => "error", "message" => $e->getMessage()]));
}
?>
