<?php
try {
    $user = "root";
    $pass = "";
    $host = "";
    $port = '3306';
    $db = "impact";
    
    $bdd = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    return $bdd;
} catch (Exception $e) {
    die('Erreur : '.$e->getMessage());
}


?>