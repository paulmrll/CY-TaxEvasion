<?php

$host="localhost";
$base="cytaxevasion";
$username="root";
$mdp="root";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$base;charset=utf8", $username, $mdp);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}
?>