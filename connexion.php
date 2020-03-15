<?php
$host = 'mysql-anthonyziane.alwaysdata.net';
$dbname = 'anthonyziane_database';
$username = '189623';
$password = 'Marseille1313';

try {

    $bdd = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);



} catch (PDOException $e) {

    die("Impossible de se connecter à la base de données $dbname :" . $e->getMessage());

}
